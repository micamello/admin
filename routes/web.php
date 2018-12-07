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

Route::get('/', function () {
  return view('auth.login');
});

Auth::routes();

Route::resource('administradores','AdministradoresController');
Route::get('administradores/{id}/destroy',
	['uses'=>'AdministradoresController@destroy',
	 'as'=>'administradores.destroy']);
Route::post('administradores/search',
	['uses'=>'AdministradoresController@search',
	 'as'=>'administradores.search']);

Route::resource('roles','RolesController');
Route::get('roles/{id}/destroy',
	['uses'=>'RolesController@destroy',
	 'as'=>'roles.destroy']);
Route::post('roles/search',
	['uses'=>'RolesController@search',
	 'as'=>'roles.search']);

Route::get('/acciones', 'AccionesController@index')->name('acciones');
Route::post('acciones/search',
	['uses'=>'AccionesController@search',
	 'as'=>'acciones.search']);

/*Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});*/

Route::get('/home', 'HomeController@index')->name('home');