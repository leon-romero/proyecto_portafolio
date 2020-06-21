@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Proveedores</h1>
  {{-- <ol class="breadcrumb"> --}}
    {{-- <li><a href=""><i class="fa fa-home"></i> Home</a></li> --}}
    {{-- <li class="active">Clientes</li> --}}
  {{-- </ol> --}}
</section>
<section class="content">
  <div class="row">

    {{-- Alerta de mensaje --}}
    @include('layout.alerta')
    {{-- Alerta de mensaje --}}
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Recepción de productos</h4>
                </div>
            </div>
            <div class="box-body">
                <table class="display table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Código: </strong> {{ $orden->codigo }}</td>
                        </tr>
                        <tr>
                            <td><strong>Proveedor: </strong> {{ $orden->proveedor->nombre_empresa }}</td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>{{ $orden->proveedor->correo }}</td>
                        </tr>
                        <tr>
                        <td><strong>Solicitante: </strong>{{ $orden->empleado->nombre_completo() }}</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha Solicitud: </strong>{{ $orden->fecha_texto() }}</td>
                        </tr>
                        <tr>
                            <td><strong>Receptor: </strong>{{ $orden->empleado_r->nombre_completo() }}</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha Recepción: </strong>{{ $orden->fecha_recepcion() }}</td>
                        </tr>
                    </tbody>			
                </table>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%">   
                        <thead>
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Stock Disponible/Critico</th>
                                <th>Cantidad Solicitada</th>
                                <th>Cantidad Recibida</th>
                            </tr>
                        </thead>								
                        <tbody>
                            @foreach ($detalles as $d)
                                <tr>
                                    <td>{{ $d->producto->nombre_producto }}</td>
                                    <td>{{ $d->producto->stock }}/{{ $d->producto->stock_critico }}</td>
                                    <td>{{ $d->cantidad }}</td>
                                    <td>{{ $d->cantidad_recibida }}</td>
                                </tr>
                            @endforeach
                        </tbody>			
                    </table>
                </div>
            </div>
            <div class="box-footer">	
                <a href="{{ route('monitoreo.solicitudes') }}" class="btn btn-danger">Volver</a>
            </div>
        </div>
    </div>			
</div>
</section>
@stop

