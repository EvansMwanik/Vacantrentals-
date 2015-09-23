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

Route::get('/', 'StoreController@index');
Route::get('rentals/view','StoreController@show');
Route::get('store/search','StoreController@search');
Route::get('store/contact','StoreController@contact');
Route::post('store/email','StoreController@email');
//Authentication routes
Route::get('Auth/login','Auth\AuthController@getLogin');
Route::post('Auth/login','Auth\AuthController@postLogin');
Route::get('Auth/logout','Auth\AuthController@getLogout');

//Registration routes
Route::get('Auth/register','Auth\AuthController@getRegister');
Route::post('Auth/register','Auth\AuthController@PostRegister');
Route::controllers(['password'=>'Auth\passwordController']);

//Estate Routes
Route::get('Admin/estates','EstatesController@index');
Route::get('Admin/estates/create','EstatesController@create');
Route::post('Admin/estates/store','EstatesController@store');
Route::delete('Admin/estates/{id}/delete','EstatesController@destroy');
Route::get('Admin/estates/edit/{id}','EstatesController@edit');
Route::put('Admin/estates/update','EstatesController@update');

//Rentaltypes Routes
Route::get('Admin/rentaltypes','RentaltypesController@index');
Route::get('Admin/rentaltypes/create','RentaltypesController@create');
Route::post('Admin/rentaltypes/store','RentaltypesController@store');
Route::delete('Admin/rentaltypes/{id}/delete','RentaltypesController@destroy');
Route::get('Admin/rentaltypes/edit/{id}','RentaltypesController@edit');
Route::put('Admin/rentaltypes/update','RentaltypesController@update');

//Rentals Routes
Route::get('Admin/rentals','RentalsController@index');
Route::get('Admin/rentals/create','RentalsController@create');
Route::post('Admin/rentals/store','RentalsController@store');
Route::delete('Admin/rentals/delete/{id}','RentalsController@destroy');
Route::get('Admin/rentals/edit/{id}','RentalsController@edit');
Route::put('Admin/rentals/update','RentalsController@update');