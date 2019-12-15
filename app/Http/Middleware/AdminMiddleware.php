<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $operation_status_active = config('contants.operation_status_active');
        if (Auth::check()) {
            if (Auth::user()->operation_status_id == $operation_status_active) {
                return $next($request);
            }else{
                return redirect()->route('login')->with('danger', '*Tài khoản của bạn đã bị vô hiệu hóa !');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
