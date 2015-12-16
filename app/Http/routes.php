<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'WebController@getFrontPage', 'as' => 'frontpage']);

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function()
{
	// Login
	Route::get('login', ['uses' => 'AuthController@getLogin', 'as' => 'login']);
	Route::post('login', ['uses' => 'AuthController@postLogin', 'as' => 'login']);

	// Signup
	Route::get('signup', ['uses' => 'AuthController@getSignup', 'as' => 'signup']);
	Route::post('signup', ['uses' => 'AuthController@postSignup', 'as' => 'signup']);

	// Logout
	Route::get('logout', ['uses' => 'AuthController@getLogout', 'as' => 'logout']);

	// Password Reset Request
	Route::get('password_reset/request', ['uses' => 'PasswordController@getResetRequest', 'as' => 'password_reset_request']);
	Route::post('password_reset/request', ['uses' => 'PasswordController@postResetRequest', 'as' => 'password_reset_request']);

	// Password Reset
	Route::get('password_reset/{user_email}/{password_reset_token}', ['uses' => 'PasswordController@getReset', 'as' => 'password_reset']);
	Route::post('password_reset/{user_email}/{password_reset_token}', ['uses' => 'PasswordController@postReset', 'as' => 'password_reset']);

	// Password Reset Invalid Token
	Route::get('password_reset/invalid_token', ['uses' => 'PasswordController@getInvalidToken', 'as' => 'password_reset_invalid_token']);
});

Route::group(['middleware' => 'auth'], function()
{
	Route::group(['namespace' => 'User'], function()
	{
		Route::get('home', ['uses' => 'DashboardController@index', 'as' => 'home']);
	});
});
