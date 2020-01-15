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

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('../auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('control_quincenal', 'controlController@control');

Route::get('agregar_control', 'controlController@agregar');

Route::get('nuevo_control', 'controlController@agregar');
 

Route::post('nuevo_control', 'controlController@agregar_control');

Route::get('ver_imprimir','ver_imprimirController@ver_imprimir');

Route::get('modif_control/{id}', 'controlController@edit');

Route::put('modif_control/{id}', 'controlController@update');

Route::delete('/borrar_control/{id}', 'controlController@borrar');





//cosecha

Route::get('cosecha', 'cosechaController@listado');
Route::get('nueva_cosecha', 'cosechaController@agregar');


Route::post('nueva_cosecha', 'cosechaController@agregar_cosecha');

Route::get('modif_cosecha/{id}', 'cosechaController@edit');

Route::put('modif_cosecha/{id}', 'cosechaController@update');

Route::delete('/borrar_cosecha/{id}', 'cosechaController@borrar');

Route::get('cosecha', 'cosechaController@listado');
Route::put('cosecha', 'cosechaController@update');

Route::get('nueva_cosecha', 'cosechaController@agregar');


Route::post('nueva_cosecha', 'cosechaController@agregar_cosecha');

Route::get('modif_cosecha/{id}', 'cosechaController@edit');

Route::put('modif_cosecha/{id}', 'cosechaController@update');

Route::get('modalcosecha/{id}', 'cosechaController@update');
Route::put('modalcosecha/{id}', 'cosechaController@update');

Route::delete('/borrar_cosecha/{id}', 'cosechaController@borrar');

//Route::delete('/modalcosecha/{id}', 'cosechaController@borrar');

//abm cliente

Route::get('abm', function () {
    return view('../abm');
});

Route::get('abm_cliente', 'clienteController@listado');
Route::get('nuevo_cliente', 'clienteController@agregar');


Route::post('nuevo_cliente', 'clienteController@agregar_cliente');

Route::get('modif_cliente/{id}', 'clienteController@edit');

Route::put('modif_cliente/{id}', 'clienteController@update');

Route::delete('/borrar_cliente/{id}', 'clienteController@borrar');

//abm capataz

Route::get('abm', function () {
    return view('../abm');
});

Route::get('abm_capataz', 'capatazController@listado');
Route::get('nuevo_capataz', 'capatazController@agregar');


Route::post('nuevo_capataz', 'capatazController@agregar_capataz');

Route::get('modif_capataz/{id}', 'capatazController@edit');

Route::put('modif_capataz/{id}', 'capatazController@update');

Route::delete('/borrar_capataz/{id}', 'capatazController@borrar');

