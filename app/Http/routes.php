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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();

// Route::post('login', 'Auth\AuthController@login');
// Route::get('login',  'Auth\AuthController@showLoginForm');
// Route::get('logout', 'Auth\AuthController@logout');

Route::get('/', 'HomeController@index');

Route::get('/user', 'UserController@index');	

Route::get('/query-type', 'QueryTypeController@index');
	
Route::get('/master-category', 'MasterCategoryController@index');

Route::get('/category', 'CategoryController@index');

Route::get('/sub-category', 'SubCategoryController@index');

Route::get('/select', 'SelectController@index');

Route::get('/option', 'OptionController@index');

Route::get('/crm/get-category', 'CrmController@getCategory');
Route::get('/crm/get-sub-category', 'CrmController@getSubCategory');
Route::get('/crm/create', 'CrmController@create');
Route::post('/crm', 'CrmController@store');

Route::get('/report/crm-form', 'ReportController@crmForm');
Route::get('/report/crm-show', 'ReportController@crmShow');

Route::get('/report/crm-form-excel', 'ExcelReportController@crmFormExcel');
Route::post('/report/crm-show-excel', 'ExcelReportController@crmShowExcel');

Route::get('change-password-form', 'UserController@changePasswordForm');
Route::post('change-password-store', 'UserController@changePasswordStore');

Route::group([ 'middleware' => 'can:sheba_admin-access'], function () {

	Route::get('/user/{id}/edit', 'UserController@edit');
	Route::put('/user/{id}', 'UserController@update');

	Route::get('/query-type/create', 'QueryTypeController@create');
	Route::post('/query-type', 'QueryTypeController@store');
	Route::get('/query-type/{id}/edit', 'QueryTypeController@edit');
	Route::put('/query-type/{id}', 'QueryTypeController@update');

	Route::get('/master-category/create', 'MasterCategoryController@create');
	Route::post('/master-category', 'MasterCategoryController@store');
	Route::get('/master-category/{id}/edit', 'MasterCategoryController@edit');
	Route::put('/master-category/{id}', 'MasterCategoryController@update');

	Route::get('/category/create', 'CategoryController@create');
	Route::post('/category', 'CategoryController@store');
	Route::get('/category/{id}/edit', 'CategoryController@edit');
	Route::put('/category/{id}', 'CategoryController@update');

	// Sub Category

	Route::get('/sub-category/create', 'SubCategoryController@create');
	Route::post('/sub-category', 'SubCategoryController@store');
	Route::get('/sub-category/{id}/edit', 'SubCategoryController@edit');
	Route::put('/sub-category/{id}', 'SubCategoryController@update');
	Route::get('/sub-category/get-category', 'SubCategoryController@getCategory');

	//Sub Category End
	Route::get('/select/create', 'SelectController@create');
	Route::post('/select', 'SelectController@store');
	Route::get('/select/{id}/edit', 'SelectController@edit');
	Route::put('/select/{id}', 'SelectController@update');

	Route::get('/option/create', 'OptionController@create');
	Route::post('/option', 'OptionController@store');
	Route::get('/option/{id}/edit', 'OptionController@edit');
	Route::put('/option/{id}', 'OptionController@update');
});