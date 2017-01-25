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
    Route::get('listado-subareas', ['uses' => 'SubareaController@getSubareas', 'as' => 'subareas']);
    Route::get('registrar-subarea', ['uses' => 'SubareaController@createSubarea', 'as' => 'create-subarea']);
    Route::post('registrar-subarea', ['uses' => 'SubareaController@storeSubarea', 'as' => 'create-subarea']);
    Route::get('actualizar-subarea/{id}', ['uses' => 'SubareaController@editSubarea', 'as' => 'edit-subarea']);   
    Route::post('actualizar-subarea/{id}', ['uses' => 'SubareaController@updateSubarea', 'as' => 'update-subarea']);        
    Route::get('eliminar-subarea/{id}', ['uses' => 'SubareaController@deleteSubarea', 'as' => 'delete-subarea']);

    // Items Routes
    Route::get('listado-items', ['uses' => 'ItemController@getItems', 'as' => 'items']);
    Route::get('registrar-item', ['uses' => 'ItemController@createItem', 'as' => 'create-item']);
    Route::post('registrar-item', ['uses' => 'ItemController@storeItem', 'as' => 'create-item']);

    Route::get('actualizar-item/{id}', ['uses' => 'ItemController@editSubarea', 'as' => 'edit-item']);
    Route::get('eliminar-item/{id}', ['uses' => 'ItemController@deleteSubarea', 'as' => 'delete-item']);   
    // Combobox Areas/Subareas by Ajax Routes
    Route::get('listado-subareas-ajax/{area_id}', 'ItemController@getSubareasByAjax');
});

Auth::routes();

