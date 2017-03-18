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
use App\customer;
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Phan thong tin cho permision
Route::group(['prefix'=>'permision'], function(){
	Route::get('list','PermisionController@getList');

	Route::get('update/{id}','PermisionController@getUpdate');
	Route::post('update/{id}','PermisionController@postUpdate');

	Route::get('add','PermisionController@getAdd');
	Route::post('add','PermisionController@postAdd');


	Route::get('delete/{id}','PermisionController@getDelete');
});


//Phan thong tin cho account
Route::group(['prefix'=>'account'], function(){
	Route::get('list','AccountController@getList');

	Route::get('update/{id}','AccountController@getUpdate');
	Route::post('update/{id}','AccountController@postUpdate');

	Route::get('add','AccountController@getAdd');
	Route::post('add','AccountController@postAdd');


	Route::get('delete/{id}','AccountController@getDelete');
});

// Phan thong tin cho type_contract
Route::group(['prefix'=>'contract'], function(){
	Route::get('list','TypeContractController@getList');

	Route::get('update/{id}','TypeContractController@getUpdate');
	Route::post('update/{id}','TypeContractController@postUpdate');

	Route::get('add','TypeContractController@getAdd');
	Route::post('add','TypeContractController@postAdd');

	Route::get('delete/{id}','TypeContractController@getDelete');
});

// Phan thong tin cho customer
Route::group(['prefix'=>'customer'], function(){
	Route::get('list','CustomerController@getList');

	Route::get('update/{id}','CustomerController@getUpdate');
	Route::post('update/{id}','CustomerController@postUpdate');

	Route::get('delete/{id}','CustomerController@getDelete');
});

//Phan thong tin cho design
Route::group(['prefix'=>'design'], function(){
 	//design/list
 	Route::get('list','DesignController@getList');
 
 	Route::get('update/{id}','DesignController@getUpdate');
 	Route::post('update/{id}','DesignController@postUpdate');
 
 	Route::get('add','DesignController@getAdd');
 	Route::post('add','DesignController@postAdd');
 
 
 	Route::get('delete/{id}','DesignController@getDelete');
  }); 		  