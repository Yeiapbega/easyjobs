<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check())
        {
            if (Auth::user()->rol_id == 1) 
            {
                return redirect('/admin/home');
            }

            if (Auth::user()->rol_id == 2) 
            {
                return redirect('/c/home');
            }

            if (Auth::user()->rol_id == 3) 
            {
                return redirect('/p/home');
            }

            if (Auth::user()->rol_id == 4) 
            {
                return redirect('/cp/home');
            }
        }

        return $next($request);
    }
}
