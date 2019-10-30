<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManagerBranchMiddleware
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
        $role_manager = Config::get('contants.role_admin');

        if (Auth::check())
        {
            if (Auth::user()->role_id == $role_manager )
            {
                return $next($request);
            }
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }
}
