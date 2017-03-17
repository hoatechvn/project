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
use App\permision;
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'permision'], function(){
	Route::get('list','PermisionController@getList');

	Route::get('update/{id}','PermisionController@getUpdate');
	Route::post('update/{id}','PermisionController@postUpdate');

	Route::get('add','PermisionController@getAdd');
	Route::post('add','PermisionController@postAdd');


	Route::get('delete/{id}','PermisionController@getDelete');
});

Route::group(['prefix'=>'account'], function(){
	Route::get('list','AccountController@getList');

	Route::get('update/{id}','AccountController@getUpdate');
	Route::post('update/{id}','AccountController@postUpdate');

	Route::get('add','AccountController@getAdd');
	Route::post('add','AccountController@postAdd');


	Route::get('delete/{id}','AccountController@getDelete');
});