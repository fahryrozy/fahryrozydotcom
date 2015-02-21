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

Route::get('/', 'WebController@master');
Route::get('index', 'WebController@index');
Route::get('resume', 'WebController@resume');
Route::get('login', 'WebController@login');
Route::post('login', 'WebController@doLogin');
Route::get('register', 'WebController@register');
Route::post('register', 'WebController@doRegister');
Route::get('logout', 'WebController@logout');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
