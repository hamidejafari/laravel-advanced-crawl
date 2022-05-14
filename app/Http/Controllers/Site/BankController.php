<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Library\MellatBank;
use App\Models\Category;
use App\Models\Country;
use App\Models\CrawledDomains;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Profit;
use App\Models\Setting;
use App\Models\Transaction;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\User;


class BankController extends Controller
{
    public function chargeBank(Request $request){


        $order = Order::create([
            'user_id'=>Auth::id(),
            'order_status_id'=>2,
            'total_prices'=>$request->charge_price,
            'payment'=>$request->charge_price,
            'type'=>1,
        ]);

        $mellat = new MellatBank();
        $orderDeta = [
            'amount' => intval($order->payment.'0'),
            'order_id' => $order->id,
            'additional_data' => '',
            'back_url'=>'https://landiper.com/back-charge-bank'
        ];
        $resCode = $mellat->startPayment($orderDeta);
        if ($resCode[0] == '0') {

$order->update([
    'ref_id'=>$resCode[1]]);
            Transaction::create([
                'ref_id'=>$resCode[1],
                'user_id'=>Auth::id(),
                'order_id'=>$orderDeta['order_id'],
                'price'=>$orderDeta['amount'],
                'ip'=>$request->ip(),
                'description'=>'افزایش اعتبار'
            ]);


            echo '<form name="myform" action="https://bpm.shaparak.ir/pgwchannel/startpay.mellat" method="POST">
					<input type="hidden" id="RefId" name="RefId" value="'. $resCode[1] .'">
				</form>
				<script type="text/javascript">window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>';
            exit;
        } else {
            return redirect('/')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
        }

    }
    public function backChargeBank(Request $request){
        if(isset($_POST['ResCode']) && $_POST['ResCode'] == '0'){
            $saleOrderId = $request->get('SaleOrderId');
            $saleReferenceId = $request->get('SaleReferenceId');
            $CardHolderPan = $request->get('CardHolderPan');
            $refId = $request->get('RefId');
            $mellat = new MellatBank();
            $orderDeta = [
                'saleOrderId' => $saleOrderId,
                'saleReferenceId' => $saleReferenceId,
            ];
            $resCode = $mellat->verifyPayment($orderDeta);
            if ($resCode == '0') {
                $resCode = $mellat->settlePayment($orderDeta);
                if ($resCode == '0') {
                     $transaction = Transaction::where('ref_id', $refId)->first();
                     $transaction->tracking_code = $saleReferenceId;
                     $transaction->card_number = $CardHolderPan;
                     $transaction->status = "SUCCEED";
                     $transaction->save();

                    $order = Order::where('ref_id', $refId)->first();
                    $order->update([
                        'order_status_id' => 3,
                        'tracking_code' => $saleReferenceId,
                        'transaction_id' => $transaction->id
                    ]);
                    Auth::loginUsingId($order->user_id);

                     $user = User::find($order->user_id);
                    $user->update([
                        'wallet'=>$user->wallet + $order->payment
                    ]);


                   return redirect('/panel/transaction/detail/'.$transaction->id)->with('success','پرداخت شما با موفقیت انجام شد!');
                } else {
                    dd($resCode);
                    return redirect('/')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
                }
            } else {

                return redirect('/')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
            }
        }else{
            $order = Order::where('ref_id', $request->get('RefId'))->first();
             Auth::loginUsingId($order->user_id);

             $user = User::find($order->user_id);
            return redirect('/panel/charge')->with('error','خطا در پرداخت');
        }
    }

    public function shopBank(Request $request,$type){
        if($type == 1){
            $order = Order::where('user_id',auth()->user()->id)->currentOrder()->first();
            $order->update([
                'order_status_id'=>3,
                'payment'=> $order->total_prices
            ]);

            $items = OrderItem::where('order_id',$order->id)->get();
            foreach($items as $row){
                $x = OrderItem::find($row->id);
                $x->update([
                    'order_item_status_id'=>8
                ]);
            }


            Transaction::create([
                'ref_id'=>null,
                'type'=>1,
                'status'=>'SUCCEED',
                'user_id'=>Auth::id(),
                'order_id'=>$order->id,
                'price'=>$order->total_prices,
                'ip'=>$request->ip(),
            ]);

            $user = User::find(auth()->user()->id);
            $user->update([
                'wallet'=>$user->wallet -  $order->total_prices
            ]);
            return redirect('/panel/order/detail/'.$order->id)->with('success','سفارش شما با موفقیت ثبت شد!');

        }elseif($type == 2){
            $order = Order::where('user_id',auth()->user()->id)->currentOrder()->first();
            $order->update([
                'order_status_id'=>2,
                'payment'=>$order->total_prices - auth()->user()->wallet
            ]);


            $mellat = new MellatBank();
            $orderDeta = [
                'amount' => intval($order->payment.'0'),
                'order_id' => $order->id,
                'additional_data' => '',
                'back_url'=>'https://landiper.com/back-shop-bank'
            ];
            $resCode = $mellat->startPayment($orderDeta);
            if ($resCode[0] == '0') {

                $order->update([
                    'ref_id'=>$resCode[1],

                ]);
                Transaction::create([
                    'ref_id'=>$resCode[1],
                    'user_id'=>Auth::id(),
                    'order_id'=>$orderDeta['order_id'],
                    'price'=>$orderDeta['amount'],
                    'ip'=>$request->ip(),
                ]);


                echo '<form name="myform" action="https://bpm.shaparak.ir/pgwchannel/startpay.mellat" method="POST">
    					<input type="hidden" id="RefId" name="RefId" value="'. $resCode[1] .'">
    				</form>
    				<script type="text/javascript">window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>';
                exit;
            } else {
                return redirect('/')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
            }

        }


    }
    public function backShopBank(Request $request){
        if(isset($_POST['ResCode']) && $_POST['ResCode'] == '0'){
            $saleOrderId = $request->get('SaleOrderId');
            $saleReferenceId = $request->get('SaleReferenceId');
            $CardHolderPan = $request->get('CardHolderPan');
            $refId = $request->get('RefId');
            $mellat = new MellatBank();
            $orderDeta = [
                'saleOrderId' => $saleOrderId,
                'saleReferenceId' => $saleReferenceId,
            ];
            $resCode = $mellat->verifyPayment($orderDeta);
            if ($resCode == '0') {
                $resCode = $mellat->settlePayment($orderDeta);
                if ($resCode == '0') {
                    $transaction = Transaction::where('ref_id', $refId)->first();
                    $transaction->tracking_code = $saleReferenceId;
                    $transaction->card_number = $CardHolderPan;
                    $transaction->status = "SUCCEED";
                    $transaction->save();

                    $order = Order::where('ref_id', $refId)->first();
                    $order->update([
                        'order_status_id' => 3,
                        'tracking_code' => $saleReferenceId,
                        'transaction_id' => $transaction->id
                    ]);
                    $items = OrderItem::where('order_id',$order->id)->get();
                    foreach($items as $row){
                        $x = OrderItem::find($row->id);
                        $x->update([
                            'order_item_status_id'=>8
                        ]);
                    }
                    Auth::loginUsingId($order->user_id);
                    $use_r = User::find($order->user_id);
                    $use_r->update([
                        'wallet'=>0    
                    ]);
                    return redirect('/panel/transaction/detail/'.$transaction->id)->with('success','پرداخت شما با موفقیت انجام شد!');
                } else {
                       $order = Order::where('ref_id', $request->get('RefId'))->first();
             Auth::loginUsingId($order->user_id);

             $user = User::find($order->user_id);
                    return redirect('/panel')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
                }
            } else {
   $order = Order::where('ref_id', $request->get('RefId'))->first();
             Auth::loginUsingId($order->user_id);

             $user = User::find($order->user_id);
                return redirect('/panel')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
            }
        }else{
            $order = Order::where('ref_id', $request->get('RefId'))->first();
             Auth::loginUsingId($order->user_id);

             $user = User::find($order->user_id);

            return redirect('/panel')->with('error','خطا در پرداخت');
        }
    }

    public function shopItemBank(Request $request){
        $input = $request->all();
        $type = $input['type'];
        $cartItem = OrderItem::find($input['order_item_id']);
        if($request->hasFile('file')){
            $pathMain = "assets/uploads/product/";
            $extension = $request->file('file')->getClientOriginalName();
            $fileName = mt_rand(100,900) . ".$extension";
            $request->file('file')->move($pathMain , $fileName);
            $input['file'] = $fileName;
        }
        $product = Product::find($request->product_id);

        $old_product_id = $cartItem->product_id;
        $cartItem->update([
            'product_id' => $product->id,
            'name' => $input['name'],
            'title' => $input['title'],
            'description' => @$input['description'],
            'file' =>@$input['file'] ?  @$input['file'] : $cartItem->file ,
            'order_item_status_id' =>19,
        ]);

        $user = User::find(auth()->user()->id);


        if($type == 1){
            $cartItem->update([
                'order_item_status_id' =>8,
            ]);
            Transaction::create([
                'ref_id'=>null,
                'order_item_id'=>$cartItem->id,
                'product_new_id'=>$cartItem->product_id,
                'product_old_id'=>$old_product_id,
                'type'=>1,
                'status'=>'SUCCEED',
                'user_id'=>Auth::id(),
                'order_id'=>$cartItem->order_id,
                'price'=> $product->price,
                'ip'=>$request->ip(),
            ]);
            $user->update([
                'wallet'=>$user->wallet -  $product->price
            ]);


            $order2 = Order::find($cartItem->order_id);
            $total_price = 0;
            $cartItems = OrderItem::where('order_item_status_id','<>','17')->whereOrderId($order2->id)->with('product')->get();
            foreach($cartItems as $row){
                $total_price = $total_price+@$row->product->price;
            }

            $order2->update([
                'total_prices'=>$total_price,
            ]);

            return redirect('/panel/order/detail/'.$cartItem->order->id)->with('success','تغییر رسانه با موفقیت انجام شد.');
        }
        elseif($type == 2){

            $mellat = new MellatBank();
            $orderDeta = [
                'amount' => intval($product->price-$user->wallet.'0'),
                'order_id' => $cartItem->id,
                'additional_data' => '',
                'back_url'=>'https://landiper.com/back-shop-item-bank'
            ];
            $resCode = $mellat->startPayment($orderDeta);
            if ($resCode[0] == '0') {


                $cartItem->update([
                    'ref_id'=>$resCode[1],
                ]);

                Transaction::create([
                    'order_item_id'=>$cartItem->id,
                    'product_new_id'=>$cartItem->product_id,
                    'product_old_id'=>$old_product_id,
                    'ref_id'=>$resCode[1],
                    'user_id'=>Auth::id(),
                    'order_id'=>$cartItem->order_id,
                    'price'=>$orderDeta['amount'],
                    'ip'=>$request->ip(),
                ]);


                echo '<form name="myform" action="https://bpm.shaparak.ir/pgwchannel/startpay.mellat" method="POST">
    					<input type="hidden" id="RefId" name="RefId" value="'. $resCode[1] .'">
    				</form>
    				<script type="text/javascript">window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>';
                exit;
            } else {
                return redirect('/')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
            }

        }
//        elseif($type == 4){
//            $user = User::find(Auth::id());
//            $user->update([
//                'wallet'=>$user->wallet + $price2
//            ]);
//            Transaction::create([
//                'ref_id'=>null,
//                'type'=>2,
//                'status'=>'SUCCEED',
//                'user_id'=>Auth::id(),
//                'order_id'=>$cartItem->order_id,
//                'price'=> $price2,
//                'ip'=>$request->ip(),
//            ]);
//            $cartItem->update([
//                'order_item_status_id'=>8
//            ]);
//            return redirect('/panel/order/detail/'.$cartItem->order->id)->with('success','تغییر رسانه با موفقیت انجام شد.');
//        }
//        elseif($type == 3){
//            $cartItem->update([
//                'order_item_status_id'=>8
//            ]);
//            return redirect('/panel/order/detail/'.$cartItem->order->id)->with('success','تغییر رسانه با موفقیت انجام شد.');
//        }

    }
    public function backShopItemBank(Request $request){


        if(isset($_POST['ResCode']) && $_POST['ResCode'] == '0'){
            $saleOrderId = $request->get('SaleOrderId');
            $saleReferenceId = $request->get('SaleReferenceId');
            $CardHolderPan = $request->get('CardHolderPan');
            $refId = $request->get('RefId');
            $mellat = new MellatBank();
            $orderDeta = [
                'saleOrderId' => $saleOrderId,
                'saleReferenceId' => $saleReferenceId,
            ];
            $resCode = $mellat->verifyPayment($orderDeta);
            if ($resCode == '0') {
                $resCode = $mellat->settlePayment($orderDeta);
                if ($resCode == '0') {
                    $transaction = Transaction::where('ref_id', $refId)->first();
                    $transaction->tracking_code = $saleReferenceId;
                    $transaction->card_number = $CardHolderPan;
                    $transaction->status = "SUCCEED";
                    $transaction->save();

                    $orderItem = OrderItem::where('ref_id', $refId)->first();
                    $orderItem->update([
                        'order_item_status_id' => 8,
                        'transaction_id' => $transaction->id
                    ]);


                    $order2 = Order::find($orderItem->order_id);
                    $total_price = 0;
                    $cartItems = OrderItem::where('order_item_status_id','<>','17')->whereOrderId($order2->id)->with('product')->get();
                    foreach($cartItems as $row){
                        $total_price = $total_price+@$row->product->price;
                    }
                    $order2->update([
                        'total_prices'=>$total_price,
                    ]);

                    Auth::loginUsingId($orderItem->order->user_id);

 $use_r = User::find($orderItem->order->user_id);
                    $use_r->update([
                        'wallet'=>0    
                    ]);
                    
                    return redirect('/panel/order/detail/'.$orderItem->order_id)->with('success','پرداخت و تغییر رسانه شما با موفقیت انجام شد!');
                } else {
                    $order_item = OrderItem::where('ref_id', $request->get('RefId'))->first();
                    Auth::loginUsingId($order_item->order->user_id);
                    $user = User::find($order_item->order->user_id);
                    return redirect('/panel')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
                }
            } else {
                $order_item = OrderItem::where('ref_id', $request->get('RefId'))->first();
                Auth::loginUsingId($order_item->order->user_id);
                $user = User::find($order_item->order->user_id);
                return redirect('/panel')->with('error','خطا در پرداخت، مجدد تلاش نمایید.');
            }
        }else{
            $order_item = OrderItem::where('ref_id', $request->get('RefId'))->first();
            Auth::loginUsingId($order_item->order->user_id);
            $user = User::find($order_item->order->user_id);
            return redirect('/panel')->with('error','خطا در پرداخت');
        }

    }
}
