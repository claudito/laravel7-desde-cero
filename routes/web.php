<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('inventarios')->group(function(){

	//Articulos
	Route::get('articulos','ArticuloController@index')
		->name('articulos.index')
		->middleware('auth');

	Route::post('articulos/agregar','ArticuloController@agregar')
		->name('articulos.agregar')
		->middleware('auth');

	Route::put('articulos/actualizar','ArticuloController@actualizar')
		->name('articulos.actualizar')
		->middleware('auth');

	Route::delete('articulos/eliminar','ArticuloController@eliminar')
		->name('articulos.eliminar')
		->middleware('auth');

	Route::get('articulos/consultar','ArticuloController@consultar')
		->name('articulos.consultar')
		->middleware('auth');


	//Almacen
	Route::get('almacen','AlmacenController@index')
	->name('almacen.index');

	Route::post('almacen/agregar','AlmacenController@agregar')
	->name('almacen.agregar');

	Route::put('almacen/actualizar','AlmacenController@actualizar')
	->name('almacen.actualizar');


	Route::get('almacen/consultar','AlmacenController@consultar')
	->name('almacen.consultar');




});





















