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


//Handle Page Requests
Route::get('home', 'WelcomeController@index');
Route::get('/', 'WelcomeController@index');
Route::get('demo', 'PagesController@index');
Route::get('category', 'PagesController@category');
Route::get('training', 'PagesController@training');
Route::get('tasks', 'PagesController@tasks');

//Handle Data Requests
//Route::get('loaddata', 'DataController@loaddata');
Route::post('loaddata', 'DataController@loaddata');
Route::post('savedata', 'DataController@savedata');
Route::get('test', 'DataController@test');

 
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
