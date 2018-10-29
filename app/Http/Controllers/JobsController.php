<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use Illuminate\Support\Facades\Auth;
use App\Models\tagJob;
use Illuminate\Support\Facades\Hash;
use Validator;

class JobsController extends Controller
{
  public function ShowRegisterJobForm()
  {
    return response()->json(   
        array('status' => 'newJob','form' => view('layouts.company.register')->render()), 200);
  }

  public function RegisterJobForm(Request $ajax)
  {
    date_default_timezone_set("America/Bogota");
    if($ajax->ajax())
    {
        $request = $ajax->all();        
        // return response()->json($ajax->all());    
        if($request['description'] == '<p>&nbsp;</p>')
        {
          $request['description'] = null;
        }      
        $data = Validator::make($request,
        [
            'title' => 'required|max:100',
            '_token' => 'required',
            'hours' => 'required',
            'pay' => 'required',
            'description' => 'required'
        ],
        [
            'title.required' => 'El titulo es requerido',
            'hours.required' => 'Las horas a trabajar son requeridas',
            'pay.required' => 'El pago por hora es requerido',
            'description.required' => 'La descripcion no puede estar vacia',
            'title.max' => 'La Identificación maximo debe tener 10 digitos',
            '_token.required' => 'access_token_lost'
        ]);
        if ($data->fails())
        {
            return response()->json(['errors' => $data->errors()]);
        }

        $now = date('Y-m-d H:i:s');
        $codeEasy = 'easy'.str_random(10).date('Ymdis').'job';
        $query = Jobs::create([
          'id' => '',
          'title' => $request['title'],
          'token' => $codeEasy,
          'description' => $request['description'],
          'hours' => $request['hours'],
          'pay' => $request['pay'],
          'publicate_date' => $now,
          'finish_date' => $now,
          'state' => 'ON',
          'offerter' => Auth::user()->dni
        ]);

        if (!$query)
        {
          return response()->json(['message' => 'Error al registrar el trabajo',
                            'errors' => 'query']);
        }
        else
        {          
          foreach($ajax->tags as $value)
          {
            tagJob::create(
            [
              'tag' => $value,
              'job' => $codeEasy
            ]);
          }
          return response()->json(['message' => "Registro realizado con exito",
                            'errors' => false,
                            'type' => 'check'], 200);
        }
      }
  }
}
