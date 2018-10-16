<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Auth\RegisterController;
use App\User;
use App\Models\Rol;
use Socialite;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function redirectToProvider($provider, $where)
    {      
        if($where == 'register')
        {
          Config::set('services.'.$provider.'.redirect', env('APP_URL').'/auth/'.$provider.'/callback/register');          
        }
        else
        {
          Config::set('services.'.$provider.'.redirect', env('APP_URL').'/auth/'.$provider.'');          
        }        
        return Socialite::driver($provider)->redirect();                    
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function handleProviderCallbackR($provider)
    {        
        Config::set('services.'.$provider.'.redirect', env('APP_URL').'/auth/'.$provider.'/callback/register'); 
        $social_user = Socialite::driver($provider)->user();
        // dd($social_user);
        if(RegisterController::RegisterSocial($social_user, $provider))
        {
          return redirect('/');
        }
        // return redirect('/register')->with('form', 'Profile updated!');
        // return response()->json(array('content' => view('includes.afterRegisterProvider')
                           // ->render(), 'data' => $social_user), 200);   
    }

    public function handleProviderCallback($provider)
    {                
        Config::set('services.'.$provider.'.redirect', env('APP_URL').'/auth/'.$provider.'');
        $social_user = Socialite::driver($provider)->user();    
        if(RegisterController::authSocial($social_user->id))
        {
          return redirect('/');
        }
        else
        {
          return redirect('/login')
                    ->withErrors(['errorLogin' => 'Debes registrarte primero']);
        }
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
               $datos_ = Rol::find(Auth::user()->rol_id)->name;
               session(['Rol' => $datos_]);

               $datos = DB::table('auth')
                           ->select('dni as user_dni', 'email as user_email','fsname as nombre','flname as apellido','phone', 'ApiToken')
                           ->where('dni', $request["dni"])
                           ->get()
                           ->toArray();     
               if($datos_ == 'PERSON')
               {
                  session(['url' => 'p/home']);
               }          
               if($datos_ == 'COMPANY')
               {
                  session(['url' => 'c/home']);
               }          
               if($datos_ == 'C-P')
               {
                  session(['url' => 'cp/home']);
               }          
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
