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

//Route::get('control_quincenal', 'controlController@buscarpor');//modifico fcon control por buscarpor para probar

//Route::get('control_quincenal', 'controlController@listado');

Route::get('control_quincenal', 'controlController@indexbuscar');//modifico fcon control por buscarpor para probar

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

Route::delete('borrar_cosecha/{id}', 'cosechaController@borrar');

//Route::get('cosecha', 'cosechaController@listado');
Route::get('cosecha', 'cosechaController@index');

Route::put('cosecha', 'cosechaController@update');

Route::get('nueva_cosecha', 'cosechaController@agregar');

Route::get('modalcosecha/{id}', 'cosechaController@update');
Route::put('modalcosecha/{id}', 'cosechaController@update');
Route::put('cosecha/{fecha}', 'cosechaController@buscar');

//abm cliente

Route::get('abm', function () {
    return view('../abm');
});

Route::get('abm_cliente', 'clienteController@buscarpor');//cambio listado por buscarpor
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

//Route::delete('/borrar_capataz/{id}', 'capatazController@borrar');

Route::delete('/borrar_capataz/{capat}', 'capatazController@borrar');


//quincena

Route::get('abm', function () {
    return view('../abm');
});

Route::get('abm_quincena', 'quincenaController@listado');
Route::get('nueva_quincena', 'quincenaController@agregar');


Route::post('nueva_quincena', 'quincenaController@agregar_quincena');

Route::get('nueva_quincenas', 'quincenaController@agregar_vs');


Route::post('nueva_quincenas', 'quincenaController@agregar_quincenas');

Route::get('modif_quincena/{id}', 'quincenaController@edit');

Route::put('modif_quincena/{id}', 'quincenaController@update');

Route::delete('/borrar_quincena/{id}', 'quincenaController@borrar');


//pdf
Route::get('control/list', 'controlController@index');
//download

Route::get('/downloadPDF/{id}', 'controlController@downloadPDF');
//ver pdf
Route::get('verPDF/{id}', 'controlController@verPDF'); //usamos
Route::get('vercosechaPDF/{id}', 'cosechaController@vercosechaPDF');
Route::get('verreportecosechaPDF/{varfechadesde}/{varfechahasta}/{varbuscacapataz}', 'cosechaController@verreportecosechaPDF');

Route::get('/imprimir/{cliente}/{quincena}', 'controlController@imprimirBuscar');

Route::get('/imprimir', 'controlController@imprimir');

//pdf con controlador
Route::get('generate-pdf', 'PDFController@generatePDF');

//sanciones

//Route::get('sancion', 'SancionController@listado');

Route::get('sancion', 'SancionController@indexbuscar'); //modifico fcon empleado por buscarpor para probar

Route::get('agregar_sancion', 'SancionController@agregar');

Route::get('nueva_sancion/{id}', 'SancionController@agregar');


Route::post('nueva_sancion/{id}', 'SancionController@agregar_sancion');

Route::get('ver_imprimir', 'ver_imprimirController@ver_imprimir');

Route::get('modif_sancion/{id}', 'SancionController@edit');

Route::put('modif_sancion/{id}', 'SancionController@update');

Route::delete('/borrar_sancion/{id}', 'SancionController@borrar');
Route::get('modal_sancio/{id}', 'SancionController@update');
Route::put('modal_sancion/{id}', 'SancionController@update');
Route::put('sancion/{fecha}', 'SancionController@buscar');

//pdf
Route::get('sancion/list', 'sancion@index');
//download

Route::get('/downloadPDF_sancion/{id}', 'sancionController@downloadPDF');
//ver pdf
Route::get('PDFSancion/{id}', 'SancionController@verPDF'); //usamos

Route::get('/imprimir_sancion/{sanciones}/{capataz}', 'sancionController@imprimirBuscar');

Route::get('/imprimir_sanciones', 'sancionController@imprimir');







//EMPRESAS

Route::get('abm_empresa', 'empresaController@listado');
Route::get('nueva_empresa', 'empresaController@agregar');
Route::post('nueva_empresa', 'empresaController@empresa');
Route::delete('/borrar_empresa/{id}', 'empresaController@borrar');

//Route::get('nueva_sancion', 'SancionController@agregar');
//Route::post('nueva_sancion', 'SancionController@agregar_sancion');
//Route::get('ver_imprimir', 'ver_imprimirController@ver_imprimir');
//Route::get('modif_sancion/{id}', 'SancionController@edit');
//Route::put('modif_sancion/{id}', 'SancionController@update');








//Empleados
Route::get('empleado', 'empleadoController@indexbuscar'); //modifico fcon empleado por buscarpor para probar
//Route::get('empleado', 'empleadoController@listado'); //modifico fcon empleado por buscarpor para probar

Route::get('agregar_empleado', 'empleadoController@agregar');

Route::get('nuevo_empleado', 'empleadoController@agregar');


Route::post('nuevo_empleado', 'empleadoController@agregar_empleado');

Route::get('ver_imprimir', 'ver_imprimirController@ver_imprimir');

Route::get('modif_empleado/{id}', 'empleadoController@edit');

Route::put('modif_empleado/{id}', 'empleadoController@update');

Route::delete('/borrar_empleado/{id}', 'empleadoController@borrar');

Route::get('empleadoSancionado/{id}', 'SancionController@listadoEmpleadoConSanciones');

Route::get('empleado/buscador', 'empleadoController@buscador'); //PARA BUSQUEDA EN TIEMPO REAL CON JS PURO

Route::get('legajo/validacion', 'empleadoController@validacion'); //PARA VALIDACION EN TIEMPO REAL CON JS PURO

//pdf
Route::get('empleado/list', 'empleado@index');
//download

Route::get('/downloadPDF_empleado/{id}', 'empleadoController@downloadPDF');
//ver pdf
Route::get('PDFEmpleado/{id}', 'empleadoController@verPDF'); //usamos

Route::get('/imprimir_empleado/{sanciones}/{capataz}', 'empleadoController@imprimirBuscar');

Route::get('/imprimir_empleado', 'empleadoController@imprimir');
