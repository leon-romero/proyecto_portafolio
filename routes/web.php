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

Route::get('leo', function () {
    return view('welcome');
});
Route::get('leo/romero', function () {
    return view('hola');
});
Route::get('leo/romero/{name}', function ($name) {
   // return view('hola');
    return "feliz cumpleaños $name";
});
Route::get('paciente','FichaClienteController@index')->name('paciente.index');
Route::get('paciente/create','FichaClienteController@create')->name('paciente.create');
Route::post('paciente','FichaClienteController@store')->name('paciente.store');
