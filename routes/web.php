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
    // Area Routes
    Route::get('listado-areas', ['uses' => 'AreaController@getAreas', 'as' => 'areas']);
    Route::get('registrar-area', ['uses' => 'AreaController@createArea', 'as' => 'create-area']);
    Route::post('registrar-area', ['uses' => 'AreaController@storeArea', 'as' => 'create-area']);
    Route::get('actualizar-area/{id}', ['uses' => 'AreaController@editArea', 'as' => 'edit-area']);   
    Route::post('actualizar-area/{id}', ['uses' => 'AreaController@updateArea', 'as' => 'update-area']);        
    Route::get('eliminar-area/{id}', ['uses' => 'AreaController@deleteArea', 'as' => 'delete-area']);

    // Subarea Routes
    Route::get('listado-subareas', ['uses' => 'subareaController@getSubareas', 'as' => 'subareas']);
    Route::get('registrar-subarea', ['uses' => 'subareaController@createSubarea', 'as' => 'create-subarea']);
    Route::post('registrar-subarea', ['uses' => 'subareaController@storeSubarea', 'as' => 'create-subarea']);
    Route::get('actualizar-subarea/{id}', ['uses' => 'subareaController@editSubarea', 'as' => 'edit-subarea']);   
    Route::post('actualizar-subarea/{id}', ['uses' => 'subareaController@updateSubarea', 'as' => 'update-subarea']);        
    Route::get('eliminar-subarea/{id}', ['uses' => 'subareaController@deleteSubarea', 'as' => 'delete-subarea']);

    // Items Routes
    Route::get('listado-items', ['uses' => 'itemController@getItems', 'as' => 'items']);
    Route::get('registrar-item', ['uses' => 'itemController@createItem', 'as' => 'create-item']);

    Route::get('actualizar-item/{id}', ['uses' => 'itemController@editSubarea', 'as' => 'edit-item']);
    Route::get('eliminar-item/{id}', ['uses' => 'itemController@deleteSubarea', 'as' => 'delete-item']);   
});

Auth::routes();

