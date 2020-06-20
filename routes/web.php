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


Route::get('home', 'HomeController@index')->name('home');

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

    Route::get('monitoreo','MonitoreoController@index')->name('monitoreo.index');
    Route::get('monitoreo/solicitud','MonitoreoController@solicitudes')->name('monitoreo.solicitudes');
    Route::get('monitoreo/provedores','MonitoreoController@proveedores')->name('monitoreo.proveedores');
    Route::get('monitoreo/provedores/{id}/create','MonitoreoController@create')->name('monitoreo.create');
    Route::post('monitoreo/provedores/{id}/create','MonitoreoController@store')->name('monitoreo.store');
   
    Route::get('monitoreo/{codigo}','MonitoreoController@show')->name('monitoreo.show');
    Route::put('monitoreo/{codigo}','MonitoreoController@update')->name('monitoreo.update');
    Route::get('monitoreo/recepcion/{codigo}','MonitoreoController@recepcion')->name('monitoreo.recepcion');

});


// CLiente
Route::group(['middleware' => 'acceso.cliente'], function() {   
// formulario servicios, fecha , hora
Route::get('homeCliente', function () { return view('paciente.index'); })->name('home.cliente');
Route::get('tomadehora','ReservarHoraController@create')->name('tomadehora.create');
Route::post('tomadehora','ReservarHoraController@store')->name('tomadehora.store');
//historial
Route::get('historiaCliente','ReservarHoraController@show')->name('tomadehora.show');
});





Route::group(['middleware' => 'acceso.odontologo'], function() {   
    Route::get('consultas','AtencionPacienteController@index')->name('atencion.index');
    Route::get('consultas/{id}','AtencionPacienteController@show')->name('atencion.show');
    Route::put('consultas/{id}','ReservarHoraController@update')->name('atencion.update');
    
    Route::get('consulta/calendario','AtencionPacienteController@calendario')->name('atencion.calendario');
    
    Route::get('consulta/historial','AtencionPacienteController@historial')->name('atencion.historial');
    Route::post('consulta/historial','AtencionPacienteController@historialBuscar')->name('atencion.historial.buscar');
    Route::get('consulta/historial/{rut}','AtencionPacienteController@historialRut')->name('atencion.historial.rut');    
});




Route::group(['middleware' => 'acceso.proveedor'], function() {   
    Route::get('pro/solicitudes','ProveedorSolicitudController@index')->name('proveedor.solicitudes');
    Route::get('pro/solicitudes/{id}','ProveedorSolicitudController@show')->name('proveedor.solicitudes.show');
});




Route::get('procedure', function(){

 

    // $clientes = DB::select('call proce_read_all_cliente()');
    // return $clientes;

    $model = new App\Modelo\Ficha_cliente();
    $cliente = $model->hydrate(
        DB::select('call proce_read_cliente($id)')
    );
    return $cliente;

});
Route::get('procedure/{id}', function($id){

 

    // $clientes = DB::select('call proce_read_all_cliente()');
    // return $clientes;

    $model = new App\Modelo\FichaCliente();
    $cliente = $model->hydrate(
        DB::select("call proce_read_cliente($id)")
    );
    return $cliente;

});