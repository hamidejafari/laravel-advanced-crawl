<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CaptchaRequest;
use App\Http\Requests\ConfirmMobileRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\TicketRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Ticket;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Transaction;

use App\Library\Help;

class PanelController extends Controller
{
    public function mobileConfirm(){
        return view('site.auth.mobile-confirm');
    }
    public function postMobileConfirm(ConfirmMobileRequest $request){
        $user = User::find(Auth::id());
        if($user->mobile_confirm_code === Help::persian2LatinDigit($request->get('code')) ){
            $user->update(['mobile_confirm'=>1]);
            return redirect()->route('site.panel.dashboard');
        }else{
            return redirect()->back()->with('error','کد فعال سازی معتبر نیست');
        }
    }
    public function dashboard(Request $request){
        $query = Product::query();
        $setting = Setting::first();
        if ($request->has('search')) {
            if ($request->get('price')) {
                $query->where('price', '<=', $request->get('price'));
            }
            if($request->get('domain')){
                $query->where('domain', 'LIKE', '%' . $request->get('domain') . '%');


            }

            if ($request->get('da')) {
                $query->where('da','>=', $request->get('da'));
            }
            if ($request->get('dr')) {
                $query->where('dr','>=', $request->get('dr'));
            }
            if ($request->get('country_id')) {
                $query->whereIn('country_id', $request->get('country_id'));
            }
            if ($request->get('language_id')) {
                $query->whereIn('language_id', $request->get('language_id'));
            }
        }



        if ($request->has('search') && $request->has('category_id')) {
            $product_ids = ProductCategory::whereIn('category_id', $request->get('category_id'))->pluck('product_id')->toArray();
             $query->whereIn('id',$product_ids);
        }

        if($request->has('sort')){
            $x = explode('|',$request->get('sort'));
            $data = $query->orderBy($x[0],$x[1])->where('show_in_list',1)->whereHas('categories')->whereHas('country')->whereHas('language')->whereBetween('price',[$setting->price_limit,$setting->price_max_limit])->paginate(20);
        }else{
            $data = $query->where('show_in_list',1)->orderBy('price','ASC')->whereHas('categories')->whereHas('country')->whereHas('language')->whereBetween('price',[$setting->price_limit,$setting->price_max_limit])->paginate(20);
        }



        $countries = Country::where('show',1)->get();
        $languages = Language::where('show',1)->get();

        $categories = Category::all();
        return view('site.panel.dashboard')
            ->with('sort',$request->has('sort') ? explode('|',$request->get('sort')) : null)
            ->with('order_item_id',@$request->get('order_item_id'))
            ->with('price',@$request->get('price'))
            ->with('domain',@$request->get('domain'))
            ->with('search',@$request->get('search'))
            ->with('da',@$request->get('da'))
            ->with('dr',@$request->get('dr'))
            ->with('country_id',@$request->get('country_id'))
            ->with('language_id',@$request->get('language_id'))
            ->with('category_id',@$request->get('category_id'))

            ->with('sort_by',@$request->get('sortBy'))


            ->with('countries',$countries)
            ->with('languages',$languages)
            ->with('categories',$categories)
            ->with('products',$data);
    }
    public function postAddOrder(OrderRequest $request){
        $input = $request->all();
        $cartItem = OrderItem::find($input['order_item_id']);

        $user_cart_check = Order::where('user_id',Auth::id())->whereHas('orderItems')->count();

        if(@$input['accept_rules'] != 1){
            return redirect()->back()->with('error','موافقت با قوانین اجباری است');
        }
        if($input['order_item_id'] !== null || $cartItem !== null){
            if($request->hasFile('file')){
                $pathMain = "assets/uploads/product/";
                $extension = $request->file('file')->getClientOriginalName();
                $fileName = mt_rand(100,900) . ".$extension";
                $request->file('file')->move($pathMain , $fileName);
                $input['file'] = $fileName;
            }
            $product = Product::find($request->product_id);
            $cartItem->update([
                'product_id' => $product->id,
                'name' => $input['name'],
                'title' => $input['title'],
                'description' => @$input['description'],
                'file' =>@$input['file'] ?  @$input['file'] : $cartItem->file ,
                'order_item_status_id' =>8,
            ]);

            return redirect('/panel/order/detail/'.$cartItem->order_id)->with('success','ایتم جدید با موفقیت به سبد خرید شما اضافه شد.');

        }else{

            $currentOrder = Order::where('user_id',auth()->user()->id)->currentOrder()->first();
            if($currentOrder == null){
                $currentOrder = Order::create([
                    'user_id' => auth()->user()->id,
                    'order_status_id' => 1
                ]);
            }


            $product = Product::find($request->product_id);
            $cartItem = OrderItem::whereOrderId($currentOrder->id)->whereProductId($product->id)->first();
            if($cartItem == null){
                if($request->hasFile('file')){
                    $pathMain = "assets/uploads/product/";
                    $extension = $request->file('file')->getClientOriginalName();
                    $fileName = mt_rand(100,900) . ".$extension";
                    $request->file('file')->move($pathMain , $fileName);
                    $input['file'] = $fileName;
                }else{
                    return redirect()->back()->with('error','انتخاب فایل اجباری است.');
                }
                $cartItem = OrderItem::create([
                    'product_id' => $product->id,
                    'name' => $input['name'],
                    'title' => $input['title'],
                    'description' => $input['description'],
                    'file' => $input['file'],
                    'order_id' => $currentOrder->id,
                    'order_item_status_id' =>19,
                ]);
            }

            $total_price = 0;
            $cartItems = OrderItem::whereOrderId($currentOrder->id)->with('product')->get();
            foreach($cartItems as $row){
                $total_price = $total_price+@$row->product->price;
            }

            $currentOrder->update([
                'total_prices'=>$total_price
            ]);
            return redirect('/panel')->with('success','ایتم جدید با موفقیت به سبد خرید شما اضافه شد.');
        }

    }
    public function orderStatus($id,$status){
        if($status == 16){
            $cartItem = OrderItem::find($id);
            $cartItem->update(['order_item_status_id'=>$status]);
            return redirect()->back()->with('success','ایتم مورد نظر با موفقیت لغو شد!');
        }else{
            return redirect()->back();
        }
    }
    public function postEditOrder(Request $request){
        $input = $request->all();
        $cartItem = OrderItem::find($input['order_item_id']);
        if($request->hasFile('file')){
            $pathMain = "assets/uploads/product/";
            $extension = $request->file('file')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('file')->move($pathMain , $fileName);
            $input['file'] = $fileName;
        }
        $cartItem->update($input);
        return redirect()->back()->with('success','با موفقیت ویرایش شد.');
    }
    public function deleteOrder($id){
        $cartItem = OrderItem::find($id);
        $cartItem->delete();

        $total_price = 0;
        $currentOrder = Order::where('user_id',auth()->user()->id)->currentOrder()->first();
        $cartItems = OrderItem::whereOrderId($currentOrder->id)->get();
        foreach($cartItems as $row){
            $total_price = $total_price+$row->product->price;
        }
        $currentOrder->update([
            'total_prices'=>$total_price
        ]);
        return redirect()->back()->with('success','آیتم با موفقیت حذف شد.');
    }
    public function cart(){
        $current_order = Order::where('user_id',auth()->user()->id)->currentOrder()->first();
        // if(!$current_order){
        //     return redirect('/')->with('success','سبد خرید شما خالی است, ابتدا ایتم جدید به سبد اضافه کنید.');
        // }
        return view('site.panel.cart')
            ->with('current_order',@$current_order);
    }
    public function postCart(Request $request){
        $currentOrder = Order::where('user_id',auth()->user()->id)->currentOrder()->first();
        $currentOrder->update(['order_status_id'=>3,'payment'=>$currentOrder->total_prices - auth()->user()->wallet]);

        return redirect('/panel/order/detail/'.$currentOrder->id)->with('success','با موفقیت انجام شد');
    }
    public function tickets(){
        $tickets = Ticket::where('user_id',Auth::id())->whereNull('reply_id')->get();
        return view('site.panel.tickets')->with('tickets',$tickets);
    }
    public function ticketDetail($id){
        $ticket = Ticket::find($id);
        return view('site.panel.ticket-detail')->with('ticket',$ticket);
    }
    public function ticketPostReply(TicketRequest $request){
        $input = $request->all();
        $ticket = Ticket::find($input['reply_id']);
        $ticket->update([
            'status'=>0
        ]);
        Ticket::create([
            'user_id'=>Auth::id(),
            'reply_id'=>$input['reply_id'],
            'content'=>$input['content']
        ]);
        return redirect()->back()->with('success','پاسخ شما با موفقیت ثبت شد');
    }
    public function ticketCreate(){
        return view('site.panel.ticket-create');
    }
    public function ticketPostCreate(TicketRequest $request){
        $input = $request->all();
        Ticket::create([
            'user_id'=>Auth::id(),
            'admin_id'=>1,
            'content'=>$input['content'],
            'subject'=>$input['subject'],
        ]);
        return redirect('/panel/tickets')->with('success','تیکت شما با موفقیت ثبت شد');
    }
    public function transactions(Request $request){

        $query = Transaction::query();
        if($request->get('order_id')){
            $query->where('order_id' ,$request->get('order_id'));
        }
        $transactions = $query->where('user_id',auth()->user()->id)->orderBy('id','DESC')->paginate(20);
        return view('site.panel.transactions')->with('transactions',$transactions);
    }
    public function transactionDetail($id){
        $transaction = Transaction::find($id);
        return view('site.panel.transaction-detail')
            ->with('transaction',$transaction);
    }
    public function orders(){
        $orders = Order::where('user_id',auth()->user()->id)->whereHas('orderItems')->orderBy('id','DESC')->get();
        return view('site.panel.orders')->with('orders',$orders);
    }
    public function orderDetail($id){
        $order = Order::find($id);
        $items = OrderItem::where('order_id',$order->id)->get();
        return view('site.panel.order-detail')
            ->with('order',$order)
            ->with('items',$items);
    }
    public function charge(){
        return view('site.panel.charge');
    }
    public function postCharge(Request $request){
        $input = $request->all();
        $user = User::find(auth()->user()->id);
        $user->update(['charge_price'=>$input['charge_price'],'wallet'=>$user->wallet+$input['charge_price']]);
        return redirect()->back()->with('success','با موفقیت انجام شد');
    }
    public function profile(){
        return view('site.panel.profile');
    }
    public function postProfile(Request $request){
        $input = $request->all();
        $user = User::find(auth()->user()->id);
        if($request->has('password')) {
            if($request->get('password') !== @$request->get('re_password')){
                return redirect()->back()->with('error','تکرار رمز عبور و رمز عبور یکسان نیستند');

            }
            $input['password'] = bcrypt($input['password']);
        }
        $user->update($input);
        return redirect()->back()->with('success','با موفقیت ذخیره شد');
    }


    public function backCharge($orderItemId){
        $order_item = OrderItem::find($orderItemId);
        $order_item->update([
            'order_item_status_id'=>17
        ]);
        $user = User::find(Auth::id());
        $user->update([
            'wallet'=>$user->wallet + @$order_item->product->price
        ]);

        $order = Order::find($order_item->order_id);
        $total_price = 0;
        $cartItems = OrderItem::where('order_item_status_id','<>','17')->whereOrderId($order->id)->with('product')->get();
        foreach($cartItems as $row){
            $total_price = $total_price+@$row->product->price;
        }

        $order->update([
            'total_prices'=>$total_price
        ]);

        return redirect()->back()->with('success','بازگشت وجه به اعتبار شما با موفقیت انجام شد.');
    }

    public function deleteItem($orderItemId){

        $cartItem = OrderItem::find($orderItemId);
        $currentOrder = Order::where('id',$cartItem->order_id)->first();

        $cartItem->delete();

        $total_price = 0;
        $cartItems = OrderItem::whereOrderId($currentOrder->id)->get();
        foreach($cartItems as $row){
            $total_price = $total_price+$row->product->price;
        }
        $currentOrder->update([
            'total_prices'=>$total_price
        ]);
        return redirect()->back()->with('success','آیتم با موفقیت حذف شد.');
    }

    public function resetPass($id){
        $str = explode('p',$id);
        return view('site.auth.reset-pass')->with('id',$id);
    }
    public function postResetPass(CaptchaRequest $request){
        $input = $request->all();
        $str = explode('p',$input['info']);
        $user = User::find($str[1]);
        if(!$user){
            return redirect('/')->back()->with('success','لینک معتبر نمیباشد');
        }
        $user->update([
            'password'=>bcrypt(Help::persian2LatinDigit($input['new_pass']))
        ]);
        return redirect('/login2')->with('success','رمز عبور شما با موفقیت تغییر کرد!');
    }
}
