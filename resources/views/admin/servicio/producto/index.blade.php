@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Productos de <strong>{{ $s->nombre_servicio }}</strong></h1>
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
    @if (count($products)>0 )
    <div class="col-md-6">
      <!-- Horizontal Form -->
      <div class="box box-danger">
          <div class="box-header with-border">
              <h3 class="box-title">Productos</h3>
              <br>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="{{ route('servicio.productoStore',$s->id_servicio) }}">
              @csrf
              <div class="box-body">  
                <div class="form-group">
                  <label class="col-sm-2 control-label">Producto</label>
                  <div class="col-sm-6">
                      <select class="form-control" id="id_producto" name="id_producto" required>
                          @foreach ($products as $p)
                            @if ($p->activo == 1 )
                              <option value="{{ $p->id_producto }}">{{ $p->nombre_producto }}</option> 
                            @endif  
                           @endforeach   
                      </select>
                  </div>
                </div>    
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <a href="/servicio" class="btn btn-danger pull-left">Volver</a>
                  <button type="submit" class="btn btn-success pull-right">Guardar</button>
              </div>
          </form>
      </div>
    </div>
    @endif  

    <div class="row"></div>
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los Servicios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                {{-- <th></th> --}}
              </tr>
            </thead>
            <tbody>
              @if (count($productos)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($productos as $pro)
                <tr>
                  <td>{{ $pro->producto->nombre_producto }}</td>
                  <form action="{{ route('servicio.productoUpdate',[$s->id_servicio, $pro->id_detalle_servicio]) }}" method="post">
                    @csrf
                    <td>
                      <input type="number" min="1" name="cantidad" value="{{ $pro->cantidad }}">
                      <button type="submit" class="btn btn-info btn-sm">Guardar</a>
                  </td>
                  </form>
                  <td><a href="{{ route('servicio.productoDelete',[$s->id_servicio,$pro->id_detalle_servicio]) }}" class="btn btn-danger">Eliminar</a></td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@stop