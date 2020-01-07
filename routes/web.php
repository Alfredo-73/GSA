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

Route::get('nuevo_control', function () {
    return view('nuevo_control');
}); 

Route::post('nuevo_control', 'controlController@agregar_control');

Route::get('ver_imprimir','ver_imprimirController@ver_imprimir');

Route::get('modif_control/{id}', 'controlController@edit');

Route::put('modif_control/{id}', 'controlController@update');