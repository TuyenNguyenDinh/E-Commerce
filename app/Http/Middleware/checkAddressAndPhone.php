<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAddressAndPhone
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
        if (
            is_null(Auth::guard('customer')->user()->phone) || is_null(Auth::guard('customer')->user()->address)) {
            if (app()->getLocale() == 'en') {
                return redirect('/')->with('warning', 'Please check your full information before proceeding');
            } else {
                return redirect('/')->with('warning', 'Vui lòng kiểm tra đầy đủ thông tin trước khi thực hiện');
            }
        }
        return $next($request);
    }
}
