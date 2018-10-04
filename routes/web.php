<?php
use Illuminate\Support\Facades\DB;

Route::group(['middleware' => 'guest'], function()
{
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	// Route::get('/chat', function()
	// {
	// 	return view('layouts.chat');
	// })->name('chat');
	Route::get('/register', 'Auth\RegisterController@ShowRegisterForm')->name('register');
	Route::post('register', 'Auth\RegisterController@RegisterForm');
	// Route::get('/login/{id?}', function($id = null)
	// {
	// 	$a = $users = DB::table('auth')->select('fname', 'email as user_email', 'dni')
	// 	->where('id', '=', $id)
	// 	->get();
	// 	foreach ($a as $key => $value)
	// 	{
	// 		return dd($value);
	// 	}
	// });

	Route::get('/', function ()
	{
	    return view('home');
	});
});



// Route::group(['middleware' => ['guest', 'offerter'], 'prefix' => 'o'], function()
// {
// 	Route::get('/home', function ()
// 	{
// 	   return view('home' ['offerter' => 'offerter']);
// 	});
// });
// Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
