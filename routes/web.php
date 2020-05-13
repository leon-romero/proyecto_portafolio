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

// Route::get('leo', function () {
//     return view('welcome');
// });
// Route::get('leo/romero', function () {
//     return view('hola');
// });
// Route::get('leo/romero/{name}', function ($name) {
//    // return view('hola');
//     return "feliz cumpleaños $name";
// });
// Route::get('paciente','FichaClienteController@index')->name('paciente.index');
// Route::get('paciente/create','FichaClienteController@create')->name('paciente.create');
// Route::post('paciente','FichaClienteController@store')->name('paciente.store');

Route::get('/', function () { return view('auth.index'); });
Route::get('home', function () { return view('home'); })->name('home');

// Route::get('paciente','FichaClienteController@index')->name('paciente.index');
// Route::get('paciente/create','FichaClienteController@create')->name('paciente.create');
// Route::post('paciente','FichaClienteController@store')->name('paciente.store');
// // Route::get('paciente/{rut}','FichaClienteController@show')->name('paciente.show');
// Route::get('paciente/{rut}/edit','FichaClienteController@edit')->name('paciente.edit');
// Route::put('paciente/{rut}/edit','FichaClienteController@update')->name('paciente.update');


Route::resource('paciente','FichaClienteController');
Route::get('paciente/{rut}/documento','FichaClienteController@documento')->name('paciente.documento.index');
Route::post('paciente/{rut}/documento','FichaClienteController@subirDocumento')->name('paciente.documento.store');
Route::get('paciente/documento/delete/{id_documento}','FichaClienteController@eliminarDocumento')->name('paciente.documento.delete');


// Route::resource('odontologo','OdontologoController'); //php artisan make:controller  OdontologoController -r
// Route::resource('empleado','EmpleadoController');
Route::resource('proveedor','FichaProveedorController');
Route::resource('empleado','EmpleadoController');
Route::resource('odontologo','OdontologoController');









Route::get('presentacion', function () {
    return view('presentacion.index');
});