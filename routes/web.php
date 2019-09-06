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

Route::post('acciones/search', ['uses'=>'AccionesController@search', 'as'=>'acciones.search']);

Route::resource('resultados','ResultadoController');
Route::get('resultados', 'ResultadoController@filterData')->name('filtroDatos');

Route::resource('plantillasEmail', 'PlantillaEmailController');
Route::get('buscarPlantillaAjax/{id}', 'PlantillaEmailController@dataPlantilla');
Route::get('/plantillaExiste/{id}/{nombre}', 'PlantillaEmailController@existePlantilla')->name('existePlantilla ');


/*Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});*/

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('candidatos', 'CandidatosController@listar')->name('candidatos');
Route::get('empresas', 'EmpresasController@listar')->name('empresas');
Route::get('ofertas', 'OfertasController@listar')->name('ofertas');
Route::get('buscarOferta/{id}', 'OfertasController@findOfertas');
Route::get('buscarOfertaAjax/{id}', 'OfertasController@buscarOfertaAjax');
Route::get('planes', 'PlanesController@listar')->name('planes');
Route::get('buscarPlan/{id}', 'PlanesController@findPlanes');
Route::get('buscarPlanAjax/{id_plan}/{id_empresa}', 'PlanesController@buscarPlanAjax');

