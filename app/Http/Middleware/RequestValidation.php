<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestValidation
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
      if(Auth::user()->ApiToken == DB::table('auth')->select('ApiToken')->where('dni', Auth::user()->dni)->get())
      {
          return $next($request);
      }
      else
      {
          $url = url()->previous();
          return redirect($url)
                      ->withErrors(['notPermission' => 'no posee el token de autorizacion']);
      }
    }
}
