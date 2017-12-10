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

Route::get('/', 'IndexController@index');
Route::get('/clients', 'ClientsController@index');
Route::get('/clients/create', 'ClientsController@create');
Route::post('/clients', 'ClientsController@store');
Route::post('/clients/csv', 'ClientsController@storecsv');
Route::get('/properties', 'PropertiesController@index');
Route::get('/properties/create', 'PropertiesController@create');
Route::post('/properties', 'PropertiesController@store');
Route::get('/properties/{property}', 'PropertiesController@show');
Route::get('/properties/{property}/tenant/create', 'PropertiesController@createTenant');
Route::post('/properties/{property}/tenant', 'PropertiesController@storeTenant');