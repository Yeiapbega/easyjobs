<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
  public function ShowRegisterJobForm()
  {
    return view('layouts.company.register');
  }
}
