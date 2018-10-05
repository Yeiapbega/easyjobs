<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCp
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
        if(Auth::user()->rol_id == 4)
        {
            return $next($request);
        }
        else
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            
            $url = url()->previous();
            return redirect($url)
                        ->withErrors(['notPermission' => 'no tienes permitido acceder a esta ruta']);
        }
    }
}