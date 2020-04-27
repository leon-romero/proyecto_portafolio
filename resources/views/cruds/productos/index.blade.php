@extends('layout.layout')

@section('contenido')

<section class="content-header">
  <h1>Lista de productos</h1>
  <ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Productos</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Mensaje</h4>
          Agregado correctamente.
        </div>
      @endif
    </div>
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los productos</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('productos.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Producto</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Cultivo</th>
                <th>Cantidad Stock</th>
                <th>Precio Compra</th>
                <th>Lugar Cultivo</th>
                <th>Tipo Producto</th>
                <th>Comentario producto</th>
                <th>comentario privado</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($productos)>0 )
                @foreach ($productos as $p)
                <tr>
                  <td>{{ $p->nombre_producto }}</td>
                  <td>{{ $p->proveedor->nombre }}</td>
                  <td>{{ $p->cultivo->nombre_cultivo }}</td>
                  <td>{{ $p->cantidad_stock }} </td>
                  <td>{{ $p->precio_compra }}</td>
                  <td>{{ $p->lugar_cultivo }}</td>
                  <td>{{ $p->tipo_producto->nombre_tipo }}</td>
                  <td>{{ $p->comentario_prod }}</td>
                  <td>{{ $p->comentario_privado }}</td>
                  <td>
                  <a href="{{ route('productos.edit', $p->id_producto) }}" class="btn btn-warning btn-sm"> Editar <i class="fa fa-edit"></i> </a>
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
