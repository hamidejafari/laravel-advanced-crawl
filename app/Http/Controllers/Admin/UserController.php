<?php

namespace App\Http\Controllers\Admin;

use App\Library\Help;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class UserController extends Controller
{

    public function getIndex(){
        $data = User::paginate(15);
        return view('admin.user.index')
            ->with('data' , $data);
    }

    public function getEdit($id){
        $data = User::findOrFail($id);
        return view('admin.user.edit')
            ->with('data', $data);
    }
    public function postEdit(Request  $request){
        $input = $request->all();
        $user = User::find($input['user_id']);
        $check_mobile = User::where('mobile',$input['mobile'])->where('id','<>',$user->id)->first();
        if($check_mobile){
            return redirect()->back()->with('error','شماره همراه کاربر تکراری است');
        }
        $check_email = User::where('email',$input['email'])->where('id','<>',$user->id)->first();
        if($check_email){
            return redirect()->back()->with('error',' ایمیل کاربر تکراری است');
        }
        @$input['mobile_confirm'] = $request->has('mobile_confirm');
        @$input['admin'] = $request->has('admin');

        if($request->get('password')){
            @$input['password'] = bcrypt(Help::persian2LatinDigit($input['password']));
        }

        $user->update($input);
        return Redirect::action('Admin\UserController@getIndex')
            ->with('success', 'ویرایش با موفقیت انجام شد');
    }

    public function loginAs($id){
        Auth::loginUsingId($id);
        return redirect('/panel')->with('success','با موفقیت لاگین شد');
    }


    public function wallet(Request $request){
        $input = $request->all();
        $user = User::find($input['user_id']);
        if($input['type'] == 1){
            $user->update([
                'wallet'=>$user->wallet + $input['wallet_price']
            ]);
            Transaction::create([
                'ref_id'=>null,
                'user_id'=>$user->id,
                'type'=>3,
                'status'=>'SUCCEED',
                'price'=> $input['wallet_price'],
                'ip'=>$request->ip(),
                'description'=>'شارژ اعتبار توسط مدیریت'
            ]);
            return redirect()->back()->with('success','با موفقیت انجام شد');

        }elseif($input['type'] == 2){
            $user->update([
                'wallet'=>$user->wallet - $input['wallet_price']
            ]);
            Transaction::create([
                'ref_id'=>null,
                'user_id'=>$user->id,
                'type'=>3,
                'status'=>'SUCCEED',
                'price'=> $input['wallet_price'],
                'ip'=>$request->ip(),
                'description'=>'کسر از اعتبار توسط مدیریت'
            ]);

            return redirect()->back()->with('success','با موفقیت انجام شد');

        }else{
            return redirect()->back();
        }
    }
}
