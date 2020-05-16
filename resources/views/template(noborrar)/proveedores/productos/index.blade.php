
@php
// Cantida de productos
$cantidad = 10;
@endphp
@extends('layout.layout')

@section('contenido')
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-12">
  @if (session('info'))
    <div class="alert alert-danger">
        {{ session('info') }}
    </div>
  @endif
  @if (session('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Mensaje</h4>
      {{ session('success') }}
    </div>
  @endif
  @if (session('danger'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Error</h4>
      {{ session('danger') }}
  </div>
  @endif
</div>
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Todos los productos</h3>
      </div>
      <div class="col-md-12 text-center">
        <a href="{{ route('productos.create')}}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-barcode"></i> Nuevo Producto</a>
      </div>
      <br>
      <br>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table class="datatable table-bordered table table-striped " cellspacing="0" width="100%">
          <thead>
            <tr class="bg-success">
              <th>Producto</th>
              <th>Nombre</th>
              <th>Cultivo</th>
              <th>Stock</th>
              {{-- <th>Precio</th> --}}
              {{-- <th>Lugar Cultivo</th> --}}
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if (count($productos)>0 )
              @foreach ($productos as $p)
              <tr>                    
                <td>{{ $p->tipo_producto->nombre_tipo }}</td>
                <td>{{ $p->nombre_producto }}</td>
                <td>{{ $p->cultivo->nombre_cultivo }}</td>
                <td>{{ $p->cantidad_stock }} </td>
                {{-- <td>{{ $p->precio_compra }}</td> --}}
                {{-- <td>{{ $p->lugar_cultivo }}</td> --}}
                <td>
                <a href="{{ route('productos.edit', $p->id_producto) }}" class="btn btn-primary btn-sm"> Editar <i class="fa fa-edit"></i> </a>
                </td>
                {{-- <td>
                  <form action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                </td> --}}
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
