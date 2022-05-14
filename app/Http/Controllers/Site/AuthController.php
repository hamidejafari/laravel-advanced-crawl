<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Library\Help;
use App\Library\Sms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar\KavenegarApi;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function register()
    {
        return view('site.auth.register');
    }
    public function postRegister(RegisterRequest $request){
         $code = random_int(100000, 999999);
//        $code = 123456;

        $input = $request->all();

        $mobile = Help::persian2LatinDigit(str_replace(' ','',$input['mobile']));
        $mobile = str_replace('+','',$mobile);
        $check = $input['mobile'][0] . $input['mobile'][1];
      
        if($check === "98" || $check === "+9"){
            $mobile = str_replace('98','',$mobile);
            $mobile = str_replace('+98','',$mobile);
            $mobile = '0'.$mobile;
        }elseif($input['mobile'][0] == "9"){
            $mobile = '0'.$mobile;
        }elseif($check == "00"){
            $mobile = str_replace('00','0',$mobile);
        }
        
        \Log::info($mobile);
        
        $user_check = User::where('mobile',$mobile)->first();
        if($user_check){
            return redirect()->back()->with('error', 'شماره همراه تکراری میباشد.');
        }
        $user = User::create([
            'name'=>$request->get('name'),
            'family'=>$request->get('family'),
            'email'=>$request->get('email'),
            'mobile'=>$mobile,
            'mobile_confirm_code'=>$code,
            'password'=>bcrypt(Help::persian2LatinDigit($request->get('password'))),
            'admin'=>0
        ]);

        Mail::raw("کد فعال سازی : " .$code, function ($message) use($user)   {
            $message->from("landiper@landiper.com"  , 'لندیپر ');
            $message->to($user->email)->subject('فعال سازی پنل کاربری ');
        });

        Sms::confirmCode($user->id);

        setcookie('mobileLoginCookie',$user->mobile , time()+(60*60*24*30));

        auth()->login($user);
        return redirect()->route('site.panel.mobile-confirm');
    }
    public function login(){
        return view('site.auth.login');
    }
    public function postLogin(Request $request){


        $input = $request->all();

        $mobile = Help::persian2LatinDigit(str_replace(' ','',$input['mobile']));
        $mobile = str_replace('+','',$mobile);
        $check = $input['mobile'][0] . $input['mobile'][1];
      
      
        if($check === "98" || $check === "+9"){
            $mobile = str_replace('98','',$mobile);
            $mobile = str_replace('+98','',$mobile);
            $mobile = '0'.$mobile;
        }elseif($input['mobile'][0] == "9"){
            $mobile = '0'.$mobile;
        }elseif($check == "00"){
            $mobile = str_replace('00','0',$mobile);
        }
        
        
        
        
        



        $login = Auth::attempt([
            'mobile' => $mobile,
            'password' => Help::persian2LatinDigit($request->get('password'))
        ]);
        if ($login) {
            setcookie('mobileLoginCookie',Help::persian2LatinDigit($request->get('mobile'))  , time()+(60*60*24*30));
            return redirect()->route('site.panel.dashboard');
        }
        return redirect()->back()->with('error', 'اطلاعات ورود اشتباه می باشد.');
    }

    public function forgetPassword(){
        return view('site.auth.forget-password');
    }
    public function postForgetPassword(Request $request){
        $check = User::where('mobile',Help::persian2LatinDigit($request->mobile_email))->orWhere('email',Help::persian2LatinDigit($request->mobile_email))->first();
        if(!$check){
            return redirect()->back()->with('error','شماره همراه یا ایمیل در لندیپر موجود نمیباشد.');
        }
        $code = random_int(100000, 999999);


        Mail::raw("رمز عبور جدید : " .$code, function ($message) use($check)   {
            $message->from("landiper@landiper.com"  , 'لندیپر ');
            $message->to($check->email)->subject('رمز عبور جدید شما در سایت لندیپر ');
        });

        try{
            $api = new KavenegarApi("656F58557978575438344C79696D346469584E2B4A6A36634972797A45444C6658414D76794B7A384C306F3D");
            $receptor = $check->mobile;
            $token = $code;
            $token2 = "";
            $token3 = "";
            $template = "forgetpassword";
            $type = "sms";//sms | call
            $result = $api->VerifyLookup($receptor,$token,$token2,$token3,$template,$type);
        }
        catch(ApiException $e){
            \Log::info($e->errorMessage());
        }
        catch(HttpException $e){
            \Log::info($e->errorMessage());
        }

        $check->update(['password'=>bcrypt($code)]);
        return redirect('/login2/')->with('success','با رمز عبور ارسال شده به شماره همراه یا ایمیل خود وارد پنل کاربری شوید.');
    }
}
