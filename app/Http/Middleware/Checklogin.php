<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Checklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('customer')->check()) {
            return $next($request);
        } else {
            if (app()->getLocale() == 'en') {
                return redirect('/')->with('warning','Please login to continue!');
            }else{
                return redirect('/')->with('warning','Vui lòng đăng nhập để tiếp tục!');    
            }
        }
        return $next($request);
    }
}
