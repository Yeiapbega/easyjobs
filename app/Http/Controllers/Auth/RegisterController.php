<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


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
              'email' => 'required|unique:auth',
              'tyc' => 'required',
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
              'name.required' => 'El campo Nombre no puede estar vacio',
              'flname.required' => 'El campo Primer Apellido no puede estar vacio',
              'slname.required' => 'El campo Segundo Apellido no puede estar vacio',
              'email.required' => 'El campo E-mail no puede estar vacio',
              'email.unique' => 'Su dirección de correo ya se encuentra en nuestra base de datos',
              'rol.required' => 'El Campo Rol es obligatorio',
              'tyc.required' => 'Debes aceptar los terminos y condiciones para registrarte',
              '_token.required' => 'token vacio'
          ]);
          if ($data->fails())
          {
              return response()->json(['errors' => $data->errors()]);
          }
          $tyc = $request['tyc'];
          if ($request['phone'] == "")
          {
            $request['phone'] = 0;
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
            'fname' => $request['name'],
            'sname' => $request['sname'],
            'flname' => $request['flname'],
            'slname' => $request['slname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => bcrypt($request['password']),
            'rol_id' => $request['rol'],
            'dataPermission' => $tyc_,
            'remember_token' => str_random(64),
            'ApiToken' => str_random(64)
          ]);

          if (!$query) {
            return response()->json(['message' => 'Error al registrar el usuario',
                              'errors' => 'query']);
          }
          else
          {
            return response()->json(['message' => "Registro realizado con exito",
                              'errors' => false,                              
                              'type' => 'check']);
          }
        }
    }


}
