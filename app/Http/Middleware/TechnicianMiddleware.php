<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Support\Facades\Auth;

class TechnicianMiddleware
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
        $role_technician = Config::get('contants.role_technician');
        if (Auth::check())
        {
            if (Auth::user()->role_id == $role_technician )
            {
                return $next($request);
            }
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
