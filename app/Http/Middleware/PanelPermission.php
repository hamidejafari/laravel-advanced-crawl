<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class PanelPermission
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $segments = $request->segments();
        $cookie = @$_COOKIE['mobileLoginCookie'];
        if($cookie !== null){
            $user = User::where('mobile',$cookie)->first();
            Auth::loginUsingId(@$user->id);
        }

        if ($this->auth->check()) {
            if ($this->auth->user()->mobile_confirm) {
                return $next($request);
            } else {
                return redirect()->route('site.panel.mobile-confirm');
            }
        }

        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect('/login2');
        }
    }
}
