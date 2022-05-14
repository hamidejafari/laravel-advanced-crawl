<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AdminPermission
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $segments = $request->segments();
        if ($this->auth->check()) {
            if ($this->auth->user()->admin == 1) {
                return $next($request);
            } else {
                return redirect('/')->with('error','شما به این بخش دسترسی ندارید');
            }
        }
        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->route('site.index');
        }
    }
}
