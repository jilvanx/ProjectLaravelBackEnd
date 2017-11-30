<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Company API
Route::resource('company', 'CompanyController',['only' => ['index', 'show', 'store', 'update', 'destroy']]);

//Employee API
Route::resource('employee', 'EmployeeController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);

//Employee Company API
Route::get('employeecompany', 'EmployeeCompanyController@index');