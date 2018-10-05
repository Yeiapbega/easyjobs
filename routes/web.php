<?php
use Illuminate\Support\Facades\DB;

Route::group(['middleware' => 'guest'], function()
{
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('/register', 'Auth\RegisterController@ShowRegisterForm')->name('register');
	Route::get('/', function ()
	{
	    return view('home');
	});
});


Route::group(['middleware' => ['auth', 'IsPerson'], 'prefix' => 'p'], function()
{
	Route::get('/home', function ()
	{
	   return view('layouts.person.home');
	});
});

Route::group(['middleware' => ['auth', 'IsCompany'], 'prefix' => 'c'], function()
{
	Route::get('/home', function ()
	{
	   return view('layouts.company.home');
	});
});

Route::group(['middleware' => ['auth', 'IsCp'], 'prefix' => 'cp'], function()
{
	Route::get('/home', function ()
	{
	   return view('layouts.cp.home');
	});
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
