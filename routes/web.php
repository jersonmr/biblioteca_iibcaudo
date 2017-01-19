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

// Autenticacion
/*Route::post('inicio-sesion', ['uses' => 'Auth\LoginController@login', 'as' => 'login']);
Route::get('cerrar-sesion', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);*/

Auth::routes();

//Route::get('/home', 'HomeController@index');
