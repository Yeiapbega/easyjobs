<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Rol;

class LoginController extends Controller
{

    use AuthenticatesUsers;

   public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $ajax) 
    {
        if($ajax->ajax())
        {
            $request = $ajax->all();
            $dni = $request['dni'];
            $data = Validator::make($request, 
            [
                'dni' => 'required|min:8',        
                'pass' => 'required|min:3',
                '_token' => 'required'    
            ],
            [
                'dni.required' => 'El campo identificacion no puede estar vacio',
                'dni.min' => 'Identificacion MIN 8 caracteres',
                'pass.required' => 'El campo contraseña no puede estar vacio',
                'pass.min' => 'Contraseña MIN 4 caracteres',
                '_token.required' => 'token vacio'
            ]); 
            if ($data->fails()) 
            {
                return response()->json(['errors' => $data->errors()]);
            }
            if($this->hasTooManyLoginAttempts($ajax))
            {
              $this->fireLockoutEvent($ajax);
              return $this->sendLockoutResponse($ajax);
            }   
            $remember = $request['remember'];
            if($remember == 'false')
            {
              $remember = false;                                   
            }else
            {
              $remember = true;
            }

            if(Auth::attempt(['dni' => $request["dni"], 'password' => $request['pass']], $remember)) 
            {                  
               $datos = Rol::find(Auth::user()->rol_id)->name;
               session(['Rol' => $datos]);

               $datos = DB::table('auth')
                           ->select('dni as user_dni', 'email as user_email','fname as nombre','flname as apellido','phone', 'ApiToken')
                           ->where('dni', $request["dni"])
                           ->get()
                           ->toArray();               
               foreach ($datos[0] as $key => $value) 
               {
                    session([$key => $value]);
               }
               return response()->json(['message' => "Has sido conectado al servidor <br> Ingresando... <strong class='counter'></strong>", 
                                 'errors' => false, 
                                 'type' => 'check']);               
            }
            else
            {
               return response()->json(['message' => "Las credenciales no fueron encontradas en nuestros registros", 
                                 'errors' => false,                                                                   
                                 'type' => 'notCredential']);
            } 
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}
