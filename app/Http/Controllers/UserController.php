<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{
	public function ShowUpdateForm()
	{
		return response()->json(   
	    		array('status' => 'formUpdate','form' => view('auth.updateUserData')->render()), 200);
	}

	public function UpdateForm(Request $ajax)
	{
		$req = array();
		if($ajax->ajax())
	    {
	        $request = $ajax->all(); 
	        // dd(User::find(Auth::user()->id)->social_id);
	        if(Auth::user()->rol_id == 2)
	        {
	        	$req = array
	        	(					
					'fsname' => 'required',
					'phone' => 'unique:auth',
					'email' => 'required|unique:auth|email',					
					'_token' => 'required'
	        	);
	        }
	        if(Auth::user()->rol_id == 3)
	        {
	        	$req = array
	        	(
					'dni' => 'min:8|max:10|unique:auth',
					'fsname' => 'required',
					'phone' => 'unique:auth',
					'flname' => 'required',
              		'slname' => 'required',
					'email' => 'required|unique:auth|email',
					'password_new' => 'required|min:4',
					'password_old' => 'required|same:password',
					'_token' => 'required'
	        	);
	        }
	        $data = Validator::make($request,
	        [
	        	$req
	        ],
	        [				
				'dni.min' => 'La Identificación minimo debe tener 8 digitos',
				'dni.max' => 'La Identificación maximo debe tener 10 digitos',
				'dni.unique' => 'La Identificación ya está registrada en la base de datos',
				'password_new.required' => 'El campo Contraseña no puede estar vacio',
				'password_new.min' => 'La contraseña debe tener minimo 4 caracteres',
				'password_new.required' => 'Por favor confirme su contraseña',
				'password_old.same' => 'Las contraseñas no coinciden, intente de nuevo',
				'name.required' => 'El campo Nombres no puede estar vacio',
				'flname.required' => 'El campo Primer Apellido no puede estar vacio',
              	'slname.required' => 'El campo Segundo Apellido no puede estar vacio',
				'email.required' => 'El campo E-mail no puede estar vacio',
				'phone.unique' => 'El teléfono ya está registrado en la base de datos',
				'email.email' => ' Ingrese un E-Mail valido',
				'email.unique' => 'Su dirección de correo ya se encuentra en nuestra base de datos',
				'_token.required' => 'token vacio'
	        ]);

	        if ($data->fails())
	      	{
	        	return response()->json(['errors' => $data->errors()]);
	      	}
		}
	}

	public static function isSocial()
	{
		$which = User::find(Auth::user()->id)->provider;
		if($which != null)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
