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
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Tabla de Productos</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="" method="post">
                        {!! csrf_field() !!}
                        {{-- <input type="text" hidden name="id_empleado" value="{{ $id_empleado }}"> --}}
                        {{-- <input type="text" hidden id="id_ficha_proveedor" name="id_ficha_proveedor" value=""> --}}
                        {{-- <input type="text" hidden id="codigo_orden" name="codigo_orden" value=""> --}}
                    
                        <table border="1" class="display table table-striped table-hover table-bordered table-sm" >
                            <thead>
                                <tr>
                                    {{-- <th>Seleccionar</th> --}}
                                    {{-- <th>#</th> --}}
                                    <th>Nombre Producto</th>
                                    <th>Stock Disponible/Critico</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>								
                            <tbody>
                                @foreach ($detalles as $d)
                                    <tr>
                                        <td>{{ $d->producto->nombre_producto }}</td>
                                        <td>{{ $d->producto->stock }}/{{ $d->producto->stock_critico }}</td>
                                        <td><input type="number" name="cantidad" value="0" min="0" required></td>
                                    </tr>
                                @endforeach
                            </tbody>			
                        </table>
                        <div class="card-action">	
                            {{-- <a href="{{ route('ordenpedido.index') }}" class="btn btn-danger">Volver</a> --}}
                            <button type="submit" class="btn btn-success pull-right">Crear solicitud</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>			

  
  </div>
</section>
@stop

