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

// Phan thong tin cho tham số giá/ diện tích
Route::group(['prefix'=>'cost'], function(){
	Route::get('list','CostController@getList');

	Route::get('update/{id}','CostController@getUpdate');
	Route::post('update/{id}','CostController@postUpdate');

	Route::get('add','CostController@getAdd');
	Route::post('add','CostController@postAdd');

	Route::get('delete/{id}','CostController@getDelete');
});

// Phan thong tin cho hồ sơ dịch vụ
Route::group(['prefix'=>'brief'], function(){
	Route::get('list','BriefController@getList');

	Route::get('update/{id}','BriefController@getUpdate');
	Route::post('update/{id}','BriefController@postUpdate');

	Route::get('add','BriefController@getAdd');
	Route::post('add','BriefController@postAdd');

	Route::get('delete/{id}','BriefController@getDelete');
});

// Phan thong tin cho hồ sơ dịch vụ chi tiết
Route::group(['prefix'=>'detailbrief'], function(){
	Route::get('list','DetailBriefController@getList');


	Route::get('add','DetailBriefController@getAdd');
	Route::post('add','DetailBriefController@postAdd');

	Route::get('delete/{id}','DetailBriefController@getDelete');
});

// Phan thong tin cho quản lý thời gian công việc
Route::group(['prefix'=>'workday'], function(){
	Route::get('list','WorkdayController@getList');

	Route::get('update/{id}','WorkdayController@getUpdate');
	Route::post('update/{id}','WorkdayControllerr@postUpdate');

	Route::get('add','WorkdayController@getAdd');
	Route::post('add','WorkdayController@postAdd');

	Route::get('delete/{id}','WorkdayController@getDelete');
});

// Phan thong tin cho type_draw
Route::group(['prefix'=>'draw'], function(){
	Route::get('list','TypeDrawController@getList');
	Route::get('update/{id}','TypeDrawController@getUpdate');
	Route::post('update/{id}','TypeDrawController@postUpdate');
	Route::get('add','TypeDrawController@getAdd');
	Route::post('add','TypeDrawController@postAdd');
	Route::get('delete/{id}','TypeDrawController@getDelete');
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

 	Route::post('addprint','DesignController@postAddprint');
 	Route::get('detail/{id}', 'DesignController@getPrintTem');
 	Route::post('updateprint/{id}','DesignController@postUpdateprint');

 
 	Route::get('add/customer/{id}','DesignController@getAddoldcus');
 	Route::get('delete/{id}','DesignController@getDelete');
  }); 


//Phan thong tin cho service
Route::group(['prefix'=>'service'], function(){
 	//service/list
 	Route::get('list','ServiceController@getList');

 
 	Route::get('update/{id}','ServiceController@getUpdate');
 	Route::post('update/{id}','ServiceController@postUpdate');
 
 	Route::get('add','ServiceController@getAdd');
 	Route::post('add','ServiceController@postAdd');

 	Route::post('addprint','ServiceController@postAddprint');
 	Route::get('detail/{id}', 'ServiceController@getPrintTem');
 	Route::post('updateprint/{id}','ServiceController@postUpdateprint');

 
 	Route::get('add/customer/{id}','ServiceController@getAddoldcus');
 	Route::get('delete/{id}','ServiceController@getDelete');
  });
//Phan thong tin cho sign
Route::group(['prefix'=>'sign'], function(){
 	//design/list
 	Route::get('list','SignController@getList');

 
 	Route::get('update/{id}','SignController@getUpdate');
 	Route::post('update/{id}','SignController@postUpdate');
 
 	Route::get('add','SignController@getAdd');
 	Route::post('add','SignController@postAdd');

 	Route::get('add/customer/{id}','SignController@getAddoldcus');
 	Route::get('delete/{id}','SignController@getDelete');
  }); 

  //Phan thong tin cho phiếu thu chi
Route::group(['prefix'=>'bill'], function(){
 	
 	Route::get('list','BillController@getList');

 	Route::get('receipts/{id}','BillController@getReceipts');
 	Route::post('receipts/{id}','BillController@postReceipts');

 	Route::get('receiptsservice/{id}','BillController@getReceiptsService');
 	Route::post('receiptsservice/{id}','BillController@postReceiptsService');

 	Route::get('signreceipts/{id}','BillController@getSignReceipts');
 	Route::post('signreceipts/{id}','BillController@postSignReceipts');

 	Route::get('payment/{id}','BillController@getPayment');
 	Route::post('payment/{id}','BillController@postPayment');

 	Route::get('paymentservice/{id}','BillController@getPaymentservice');
 	Route::post('paymentservice/{id}','BillController@postPaymentservice');

 	Route::get('update/{id}','BillController@getUpdate');
 	Route::post('update/{id}','BillController@postUpdate');
 });

//Phan thong ke thu chi
Route::group(['prefix' => 'filter'], function(){

	Route::post('idcontract','FilterController@postIdcontruct');
	Route::post('date','FilterController@postDate');
	Route::post('month','FilterController@postMonth');
	Route::post('year','FilterController@postYear');
});
Route::get('contracttemplate/receipts/{id}', 'BillController@getRecTem');
Route::get('contracttemplate/receiptsservice/{id}', 'BillController@getRecTemSer');
Route::get('contracttemplate/signreceipts/{id}', 'BillController@getSignRecTem');
Route::get('contracttemplate/payment/{id}', 'BillController@getPayTem');
Route::get('contracttemplate/paymentservice/{id}', 'BillController@getPayTemSer');

//Phan thong tin cho phiếu thống kê hoa hồng
Route::group(['prefix'=>'statistic'], function(){
  	
  	Route::get('list','StatisticController@getList');
  	Route::post('filter','StatisticController@postFilter');
});