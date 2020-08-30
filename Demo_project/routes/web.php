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

Route::get('/', function () {
    return view('login');
});



Route::post('login', 'AdminController@authenticate');

Route::get('customer-list', 'CustomerManageController@getCustomerList');
Route::get('customer-form', 'CustomerManageController@getCustomerForm');
Route::post('save-customer', 'CustomerManageController@saveCustomerForm');
Route::any('customer-edit/{id}', 'CustomerManageController@getCustomerIndex');
Route::any('customer-delete/{id}', 'CustomerManageController@getCustomerDelete');
Route::get('customer-list', 'CustomerManageController@getCustomerList');

Route::group(['middleware' => ['jwt.verify']], function() {
    //Route::get('customer-list', 'CustomerManageController@getCustomerList');
	//Route::get('customer-form', 'CustomerManageController@getCustomerForm');
	//Route::post('save-customer', 'CustomerManageController@saveCustomerForm');
	//Route::any('customer-edit/{id}', 'CustomerManageController@getCustomerIndex');
	//Route::any('customer-delete/{id}', 'CustomerManageController@getCustomerDelete');
});