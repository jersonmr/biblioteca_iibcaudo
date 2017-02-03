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
Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function() {

        Route::get('panel-administrador', ['uses' => 'AdminController@getDashboard', 'as' => 'dashboard']);

        // User Routes
        Route::get('listado-usuarios', ['uses' => 'UserController@getUsers', 'as' => 'users']);
        Route::get('registrar-usuario', ['uses' => 'UserController@createUser', 'as' => 'create-user']);
        Route::post('registrar-usuario', ['uses' => 'UserController@storeUser', 'as' => 'create-user']);
        Route::get('editar-usuario/{id}', ['uses' => 'UserController@editUser', 'as' => 'edit-user']);
        Route::put('editar-usuario/{id}', ['uses' => 'UserController@updateUser', 'as' => 'update-user']);
        Route::get('eliminar-usuario/{id}', ['uses' => 'UserController@deleteUser', 'as' => 'delete-user']);

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
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'role:editor'], function() {

        // Items Routes
        Route::get('listado-items', ['uses' => 'ItemController@getItems', 'as' => 'items']);
        Route::get('registrar-item', ['uses' => 'ItemController@createItem', 'as' => 'create-item']);
        Route::post('registrar-item', ['uses' => 'ItemController@storeItem', 'as' => 'create-item']);

        Route::get('actualizar-item/{id}', ['uses' => 'ItemController@editItem', 'as' => 'edit-item']);
        Route::put('actualizar-item/{id}', ['uses' => 'ItemController@updateItem', 'as' => 'update-item']);
        
        Route::delete('eliminar-item/{id}', ['uses' => 'ItemController@deleteItem', 'as' => 'delete-item']);   

        // Combobox Areas/Subareas by Ajax Routes
        Route::get('listado-subareas-ajax/{area_id}', 'ItemController@getSubareasByAjax');
        // File's Get Routes
        Route::get('descargar-archivo/{item_id}', ['uses' => 'ItemController@getFile', 'as' => 'item-file']);

    });
    

    // Investigator Routes
    Route::group(['prefix' => 'investigator'], function() {
        Route::get('panel-investigador', ['as' => 'inv-dashboard', 'uses' => 'InvestigatorController@getDashboard']);
        Route::get('detalle-articulo/{id}', ['as' => 'item-detail', 'uses' => 'InvestigatorController@itemDetail']);    
    });
    
    Route::get('cambiar-contraseña', ['as' => 'change-key', 'UserController@changeKey'])->middleware('auth');
    
});



Auth::routes();

