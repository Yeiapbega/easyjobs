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
      $var = DB::table('auth')->where('dni', Auth::user()->dni)->value('ApiToken');
      if($request->ajax())
      {
          if((session()->get('ApiToken') == $var) && ($var != ""))
          {
              return $next($request);
          }
          else
          {
            return response()->json(['Unauthorized' => 401]);
          }
      }
      else
      {
          $url = url()->previous();
          return redirect($url)
                      ->withErrors(['notPermission' => 'no posee el token de autorizacion']);
      }
    }
}
