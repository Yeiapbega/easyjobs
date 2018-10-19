<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use File; 
use App\Models\Rol;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    // protected $guard = 'social';

    public function ShowRegisterForm()
    {
      return view('auth.register');
    }

    public function RegisterForm(Request $ajax)
    {
      if($ajax->ajax())
      {
          $request = $ajax->all();

          // $passc = $request->password_conf;
          $data = Validator::make($request,
          [
              'dni' => 'required|min:8|max:10|unique:auth',
              'name' => 'required',
              'flname' => 'required',
              'slname' => 'required',
              'phone' => 'unique:auth',
              'email' => 'required|unique:auth|email',
              'tyc' => 'accepted',
              'rol' => 'required',
              'password' => 'required|min:4',
              'password_conf' => 'required|same:password',
              '_token' => 'required'
          ],
          [
              'dni.required' => 'El campo Identificación no puede estar vacio',
              'dni.min' => 'La Identificación minimo debe tener 8 digitos',
              'dni.max' => 'La Identificación maximo debe tener 10 digitos',
              'dni.unique' => 'La Identificación ya está registrada en la base de datos',
              'password.required' => 'El campo Contraseña no puede estar vacio',
              'password.min' => 'La contraseña debe tener minimo 4 caracteres',
              'password_conf.required' => 'Por favor confirme su contraseña',
              'password_conf.same' => 'Las contraseñas no coinciden, intente de nuevo',
              'name.required' => 'El campo Nombres no puede estar vacio',
              'flname.required' => 'El campo Primer Apellido no puede estar vacio',
              'slname.required' => 'El campo Segundo Apellido no puede estar vacio',
              'email.required' => 'El campo E-mail no puede estar vacio',
              'phone.unique' => 'El teléfono ya está registrado en la base de datos',
              'email.email' => ' Ingrese un E-Mail valido',
              'email.unique' => 'Su dirección de correo ya se encuentra en nuestra base de datos',
              'rol.required' => 'El Campo Rol es obligatorio',
              'tyc.accepted' => 'Debes aceptar los terminos y condiciones para registrarte',
              '_token.required' => 'token vacio'
          ]);
          if ($data->fails())
          {
              return response()->json(['errors' => $data->errors()]);
          }
          $tyc = $request['tyc'];
          if ($request['phone'] == "")
          {
            $request['phone'] = null;
          }
          if($tyc == 'false')
          {
            $tyc_ = "NO";
          }
          else
          {
            $tyc_ = "YES";
          }

          $query = User::create([
            'id' => '',
            'dni' => $request['dni'],
            'fsname' => $request['name'],            
            'flname' => $request['flname'],
            'slname' => $request['slname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => bcrypt($request['password']),
            'rol_id' => $request['rol'],
            'dataPermission' => $tyc_,
            'remember_token' => str_random(64),
            'ApiToken' => str_random(64),
            'dataComplete' => '1'
          ]);

          if (!$query) 
          {
            return response()->json(['message' => 'Error al registrar el usuario',
                              'errors' => 'query']);
          }
          else
          {
            return response()->json(['message' => "Registro realizado con exito",
                              'errors' => false,                              
                              'type' => 'check'], 200);
          }
        }
    }

    public static function RegisterSocial($data, $provider)
    {
      $request = $data;                    
      //To show picture 
      // $picture = public_path('uploads/profile/' . $user->getId() . ".jpg");
      // dd($data->avatar_original);  
      if($provider == 'google')
      {
        if(RegisterController::authSocial($request['id']))
         {
            return true;
         }
         else
         {
            $email = null;
            if(isset($request->email))
            {
              $email = $request->email;
            }
            $fileContents = file_get_contents($request->avatar_original);      
            File::put(public_path() . '/src/profile_photos/' . $request->id . ".jpg", $fileContents);
            $avatar = '/src/profile_photos/' . $request->id . ".jpg";
            $query = User::create(
            [
                'id' => '',
                'dni' => null,
                'fsname' => $request->name,                
                'email' => $email,
                'dataPermission' => 'YES',
                'remember_token' => str_random(64),
                'ApiToken' => str_random(64),
                'social_id'=> $request['id'],
                'provider' => $provider,
                'photo' => '/src/profile_photos/' . $request->id . ".jpg",
                'dataComplete' => '0'
            ]);

            if (!$query) 
            {
              redirect('/')
                ->withErrors(['errorRegister' => 'Error al registrar']);
            }
            else
            {
              if(RegisterController::authSocial($request['id']))
              {
                return true;
              }
            }
         }
      }
      else
      {
         if(RegisterController::authSocial($request['id']))
         {
            return true;
         }
         else
         {
            $email = null;
            if(isset($request["email"]))
            {
              $email = $request["email"];
            }
            $fileContents = file_get_contents($request->avatar_original);      
            File::put(public_path() . '/src/profile_photos/' . $request->id . ".jpg", $fileContents);
            $avatar = '/src/profile_photos/' . $request->id . ".jpg";
            $query = User::create(
            [
                'id' => '',
                'dni' => null,
                'fsname' => $request['name'],                
                'email' => $email,
                'dataPermission' => 'NO',
                'remember_token' => str_random(64),
                'ApiToken' => str_random(64),
                'social_id'=> $request['id'],
                'provider' => $provider,
                'photo' => '/src/profile_photos/' . $request->id . ".jpg",
                'dataComplete' => '0'
            ]);

            if (!$query) 
            {
              redirect('/')
                ->withErrors(['errorRegister' => 'Error al registrar']);
            }
            else
            {
              if(RegisterController::authSocial($request['id']))
              {
                return true;
              }
            }
         }
      }
      
    }

    public static function isComplete($id)
    {
      $w = User::find(Auth::user()->id)->dataComplete;
      // dd($w);
      if($w == 0)
      {
        return true;
      }
      return false;
    }

    public static function authSocial($social)
    {
      $id = DB::table('auth')           
           ->where('social_id', $social)
           ->value('id'); 
      // dd($id);
      if(empty($id))
      {
        return false;
      }
      else
      {
        // dd($id);
        if(Auth::loginUsingId($id)) 
        {             
          // session(['Rol' => $datos]);            
          $datos = DB::table('auth')
                     ->select('id', 'rol_id', 'dni as user_dni', 'email as user_email','fsname as nombre','flname as apellido','phone', 'ApiToken')
                     ->where('social_id', $social)
                     ->get()
                     ->toArray();               
          foreach ($datos[0] as $key => $value) 
          {
              session([$key => $value]);
          }
          if($datos[0]->rol_id == 3)
          {
            session(['url' => 'p/home']);
          }          
          if($datos[0]->rol_id == 2)
          {
            session(['url' => 'c/home']);
          }          
          if($datos[0]->rol_id == 4)
          {
            session(['url' => 'cp/home']);
          }
          return true;      
        }
        else
        {
          return false;
        }
      }      
    }

    public static function FirstLoginRegisterForm(Request $ajax)
    {
      if($ajax->ajax())
      {
        $request = $ajax->all();
        $datos = DB::table('auth')
                     ->select('id')
                     ->where('email', $request['email'])
                     ->get()
                     ->toArray();          
        $data = Validator::make($request,
        [
            'dni' => 'required|min:8|max:10|unique:auth',          
            'email' => 'required|email',
            'tyc' => 'accepted',
            'rol' => 'required',
            'phone' => 'unique:auth',            
            '_token' => 'required'
        ],
        [
            'dni.required' => 'El campo Identificación no puede estar vacio',
            'dni.min' => 'La Identificación minimo debe tener 8 digitos',
            'dni.max' => 'La Identificación maximo debe tener 10 digitos',
            'dni.unique' => 'La Identificación ya está registrada en la base de datos',                            
            'phone.unique' => 'El teléfono ya está registrado en la base de datos',
            'email.required' => 'El campo E-mail no puede estar vacio',
            'email.email' => ' Ingrese un E-Mail valido',
            'rol.required' => 'El Campo Rol es obligatorio',
            'tyc.accepted' => 'Debes aceptar los terminos y condiciones para registrarte',
            '_token.required' => 'token vacio'
        ]);           

        if ($data->fails())
        {
          return response()->json(['errors' => $data->errors()]);
        }
        else
        {
          $tyc = $request['tyc'];
          if($tyc == 'false')
          {
            $tyc_ = "NO";
          }
          else
          {
            $tyc_ = "YES";
          }
          $update = User::find(Auth::user()->id);
          if(empty($datos[0]->id))
          {
            $update->email = $request['email'];
            // return response()->json(['errors' => 'Error al registrar informacion']);
          }          
          $update->dni = $request['dni'];
          $update->phone = $request['phone'];          
          $update->rol_id = $request['rol'];
          $update->dataPermission = $tyc_;
          $update->dataComplete = 1;
          if($update->save())
          {            
            session(['Rol' => $request['rol']]);
            if($request['rol'] == 3)
            {
              session(['url' => 'p/home']);
            }          
            if($request['rol'] == 2)
            {
              session(['url' => 'c/home']);
            }          
            if($request['rol'] == 4)
            {
              session(['url' => 'cp/home']);
            }
            return response()->json(['message' => "Registro realizado con exito",
                                'errors' => false,                              
                                'type' => 'check',
                                'url' => session()->get('url')], 200);
          }
          else
          {
            return response()->json(['errors' => 'Error al registrar informacion']);
          }
          
        }
       
        // return response()->json([$request], 200);
      }
    }
}
