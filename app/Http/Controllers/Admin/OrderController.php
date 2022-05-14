<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Sms;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\Transaction;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ServiceRequest;
use App\Models\Content;

class OrderController extends Controller
{
    public function getIndex(Request $request){

        $query = Order::query();



        if($request->get('order_status_id')){
            $query->where('order_status_id' , $request->get('order_status_id'));

        }
        if($request->get('price_from')){
            $query->whereBetween('total_prices' ,[intval($request->get('price_from')),intval($request->get('price_to'))]);
        }


        if($request->get('user_name')){
            $query->whereHas('user', function (Builder $query)use($request) {
                $query->where('name', 'LIKE', '%' . $request->get('user_name') . '%');
            });
        }
        if($request->get('user_family')){
            $query->whereHas('user', function (Builder $query)use($request) {
                $query->where('family', 'LIKE', '%' . $request->get('user_family') . '%');
            });
        }

        if($request->get('user_mobile')){
            $query->whereHas('user', function (Builder $query)use($request) {
                $query->where('mobile', $request->get('user_mobile') );
            });
        }



        $data = $query->orderBy('id','DESC')->paginate(15);

        $statuses = OrderStatus::where('type',1)->get();
        return view('admin.order.index')
            ->with('statuses' , $statuses)
            ->with('data' , $data);
    }

    public function getDetail($id){
        $data = Order::find($id);
        $status_item = OrderStatus::where('type',2)->get();
        $status_order = OrderStatus::where('type',1)->get();
        return view('admin.order.detail')
            ->with('status_item' , $status_item)
            ->with('status_order' , $status_order)
            ->with('data' , $data);
    }
    public function postChange(Request $request){
        $input = $request->all();


        $order = Order::find($input['order_id']);
        $msg = null;
        $user = User::find($order->user_id);

        $msg = $user->name . ' ' . $user->family . "
        ".  " وضعیت سفارش رپورتاژ شما با کد پیگیری " . $order->id . " در سایت لندیپر تغییر کرد, وارد پنل کاربری خود شوید و جزییات آن را مشاهده کنید. ";


        if($input['type'] == 2){
            $orderItem = OrderItem::find($input['order_item_id']);
            $orderItem->update($input);
            if(
                $orderItem->order_item_status_id == 10 ||
                $orderItem->order_item_status_id == 12 ||
                $orderItem->order_item_status_id == 13 ||
                $orderItem->order_item_status_id == 16 ||
                $orderItem->order_item_status_id == 14
            ){
                $msg = $msg. "
                ". "همچنین مبلغ رپورتاژ به اعتبار شما بازگشت.";
                $user->update([
                    'wallet'=>$user->wallet + @$orderItem->product->price
                ]);
                $order2 = Order::find($orderItem->order_id);
                $total_price = 0;
                $cartItems = OrderItem::where('order_item_status_id','<>','17')->whereOrderId($order2->id)->with('product')->get();
                foreach($cartItems as $row){
                    $total_price = $total_price+@$row->product->price;
                }
                $order2->update([
                    'total_prices'=>$total_price
                ]);

                Transaction::create([
                    'ref_id'=>null,
                    'order_item_id'=>$orderItem->id,
                    'product_new_id'=>$orderItem->product_id,
                    'type'=>2,
                    'status'=>'SUCCEED',
                    'user_id'=>$order2->user_id,
                    'order_id'=>$order2->id,
                    'price'=> @$orderItem->product->price,
                    'ip'=>$request->ip(),
                ]);
            }
        }else{
            Order::find($input['order_id'])->update([$input]);
        }


        Sms::orderStatusUser($msg,$user->mobile);

        Mail::raw($msg, function ($message) use($user)   {
            $message->from("landiper@landiper.com"  , 'لندیپر ');
            $message->to($user->email)->subject('تغییر وضعیت فاکتور');
        });

        return redirect()->back()->with('success','با موفقیت ویرایش شد');
    }
}
