<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function()
{
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	
	Route::get('/', function () 
	{
	    return view('home');
	});
});

// Route::group(['middleware' => ['auth', 'root'], 'prefix' => 'root'], function()
// {
// 	Route::get('/home', function () 
// 	{
// 	   return view('root.home');
// 	});		
// });
// Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

