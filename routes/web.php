<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('panel-administrador', ['uses' => 'AdminController@getDashboard', 'as' => 'dashboard']);
});

Auth::routes();

