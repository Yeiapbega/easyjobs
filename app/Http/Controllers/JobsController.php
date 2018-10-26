<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\tagJob;

class JobsController extends Controller
{
  public function ShowRegisterJobForm()
  {
    return view('layouts.company.register');
  }

  public function RegisterJobForm(Request $ajax)
  {
    if($ajax->ajax())
    {
        $request = $ajax->all();

        // $passc = $request->password_conf;
        $data = Validator::make($request,
        [
            'dni' => 'required|min:8|max:10|unique:auth',
            '_token' => 'required'
        ],
        [
            'dni.required' => 'El campo Identificación no puede estar vacio',
            '_token.required' => 'token vacio'
        ]);
        if ($data->fails())
        {
            return response()->json(['errors' => $data->errors()]);
        }

        $query = Jobs::create([
          'id' => '',
          'title' => $request['dni'],
          'description' => $request['name'],
          'images' => $request['flname'],
          'hours' => $request['slname'],
          'pay' => $request['email'],
          'publicate_date' => $request['phone'],
          'finish_date' => $request['dni'],
          'state' => $request['rol'],
          'offerter' => $request['dni']
        ]);

        $query = tagJob::create([
          'id' => '',
          'title' => $request['dni'],
          'description' => $request['name'],
          'images' => $request['flname'],
          'hours' => $request['slname'],
          'pay' => $request['email'],
          'publicate_date' => $request['phone'],
          'finish_date' => $request['dni'],
          'state' => $request['rol'],
          'offerter' => $request['dni']
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
}
