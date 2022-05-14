<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginAdminRequest $request)
    {
        $login = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        if ($login) {
            return Redirect::action('Admin\AdminController@getAdmin')
                ->with('success', 'به پنل ادمین خوش آمدید.');
        }
        return Redirect::action('Auth\LoginController@getLogin')
            ->with('error', 'اطلاعات ورود اشتباه می باشد.');
    }


    public function logout()
    {
        Auth::logout();
        return Redirect::action('Site\HomeController@index');
    }

    protected function loggedOut(Request $request)
    {
        return Redirect::action('Site\HomeController@index');
    }
}
