<?php

Route::get('/', function () { return view('presentacion.index'); });

Route::get('loginEmpleado', function () { return view('auth.empleado'); })->name('login.empleado');
Route::post('loginEmpleado', 'Authlogin\AuthLogin@loginEmpleado')->name('login.empleado');

Route::get('loginCliente', function () { return view('auth.cliente'); })->name('login.cliente');
Route::post('loginCliente', 'Authlogin\AuthLogin@loginCliente')->name('login.cliente');

Route::get('loginProveedor', function () { return view('auth.proveedor'); })->name('login.proveedor');
Route::post('loginProveedor', 'Authlogin\AuthLogin@loginProveedor')->name('login.proveedor');

Route::get('loginOdontologo', function () { return view('auth.odontologo'); })->name('login.odontologo');
Route::post('loginOdontologo', 'Authlogin\AuthLogin@loginOdontologo')->name('login.odontologo');

Route::get('salir', 'Authlogin\AuthLogin@logout')->name('login.salir');



// Route::get('paciente','FichaClienteController@index')->name('paciente.index');
// Route::get('paciente/create','FichaClienteController@create')->name('paciente.create');
// Route::post('paciente','FichaClienteController@store')->name('paciente.store');
// // Route::get('paciente/{rut}','FichaClienteController@show')->name('paciente.show');
// Route::get('paciente/{rut}/edit','FichaClienteController@edit')->name('paciente.edit');
// Route::put('paciente/{rut}/edit','FichaClienteController@update')->name('paciente.update');

Route::get('home', function () { return view('home'); })->name('home');

Route::group(['middleware' => 'acceso.empleado'], function() {   
    Route::resource('paciente','FichaClienteController');
    Route::get('paciente/{rut}/documento','FichaClienteController@documento')->name('paciente.documento.index');
    Route::post('paciente/{rut}/documento','FichaClienteController@subirDocumento')->name('paciente.documento.store');
    Route::get('paciente/documento/delete/{id_documento}','FichaClienteController@eliminarDocumento')->name('paciente.documento.delete');
    Route::resource('proveedor','FichaProveedorController');
    Route::post('provedor/producto','DetalleProveedorController@store')->name('proveedor.producto.store');
    Route::delete('provedor/producto/{id}','DetalleProveedorController@destroy')->name('proveedor.producto.destroy');
    Route::resource('empleado','EmpleadoController');
    Route::resource('odontologo','OdontologoController');
    Route::resource('servicio','ServicioController');
    Route::resource('producto','ProductoController');
});


// CLiente
Route::group(['middleware' => 'acceso.cliente'], function() {   
// formulario servicios, fecha , hora
Route::get('homeCliente', function () { return view('paciente.index'); })->name('home.cliente');
//nuevo (Reservar_hora)
Route::post('tomadehora','FichaClienteController@create')->name('usuario.tomadehora.create');

});





Route::group(['middleware' => 'acceso.odontologo'], function() {   
Route::get('consulta/listado','AtencionPacienteController@index')->name('atencion.index');
Route::get('consulta/{id}','AtencionPacienteController@show')->name('atencion.show');


});


