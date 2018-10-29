<?php
Route::group(['middleware' => 'guest'], function()
{
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');

	Route::get('/register', 'Auth\RegisterController@ShowRegisterForm')->name('register');
	Route::post('register', 'Auth\RegisterController@RegisterForm');
	Route::group(['prefix' => 'auth'], function ()
	{
	    Route::get('/{provider}/{where}', 'Auth\LoginController@redirectToProvider')->name('social.auth');
	    Route::get('/{provider}', 'Auth\LoginController@handleProviderCallback');
	    Route::get('/{provider}/callback/register', 'Auth\LoginController@handleProviderCallbackR');
	});
});

Route::get('/', function ()
{
    return view('home');

});

Route::group(['middleware' => 'auth'], function()
{
	Route::post('firstLoginForm', 'Auth\RegisterController@FirstLoginRegisterForm');
	Route::group(['middleware' => ['IsPerson'], 'prefix' => 'p'], function()
	{
	    Route::get('/home', function ()
		{
		   return view('layouts.person.home');
		})->name('homeP');

		Route::post('/request', function ()
		{
		   return view('layouts.person.home');
		})->middleware('RequestValidation');

		Route::post('/register/job', 'JobsController@ShowRegisterJobForm')->middleware('RequestValidation');
		Route::post('/update/user', 'UserController@ShowUpdateForm')->middleware('RequestValidation');
		/////////////////////////////////////////////////////////////////////////////////////////////////////
		Route::post('/register/job/new', 'JobsController@RegisterJobForm')->middleware('RequestValidation');
		Route::post('/update/user/new', 'UserController@UpdateForm')->middleware('RequestValidation');
	});

	Route::group(['middleware' => ['IsCompany'], 'prefix' => 'c'], function()
	{
		Route::get('/home', function ()
		{
		   return view('layouts.company.home');
		})->name('homeC');

		Route::get('/register/job', function ()
		{
		   return view('layouts.company.register');
		})->name('registerC');

		Route::post('/register/job', 'JobsController@ShowRegisterJobForm')->middleware('RequestValidation');
		Route::post('/update/user', 'UserController@ShowUpdateForm')->middleware('RequestValidation');
		/////////////////////////////////////////////////////////////////////////////////////////////////////
		Route::post('/register/job/new', 'JobsController@RegisterJobForm')->middleware('RequestValidation');
		Route::post('/update/user/new', 'UserController@UpdateForm')->middleware('RequestValidation');
	});

	Route::group(['middleware' => ['IsCp'], 'prefix' => 'cp'], function()
	{
		Route::get('/home', function ()
		{
		   return view('layouts.cp.home');
		})->name('homeCP');
	});
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/chat', function()
{
	return view('layouts.chat');
});
