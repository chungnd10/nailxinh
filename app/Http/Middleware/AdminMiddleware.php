<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check())
        {
            if (Auth::user()->role_id == 1 )
            {
                return $next($request);
                dd(Auth::user()->role_id);
            }
            dd(Auth::user()->role_id);
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
