<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function ShowUpdateForm()
	{
		return response()->json(   
	    		array('status' => 'ok','form' => view('auth.updateUserData')->render()), 200);
	}

}
