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
    // Area Route
    Route::get('listado-areas', ['uses' => 'AreaController@getList', 'as' => 'areas']);
    Route::get('registrar-area', ['uses' => 'AreaController@createArea', 'as' => 'create-area']);
    Route::post('registrar-area', ['uses' => 'AreaController@storeArea', 'as' => 'create-area']);
    Route::get('actualizar-area/{id}', ['uses' => 'AreaController@editArea', 'as' => 'edit-area']);   
    Route::post('actualizar-area/{id}', ['uses' => 'AreaController@updateArea', 'as' => 'update-area']);        
});

Auth::routes();

