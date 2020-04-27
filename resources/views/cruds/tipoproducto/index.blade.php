@extends('layout.layout')
@php
$agregado=false;
@endphp
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
      @if ($agregado)
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
          <h3 class="box-title">Todos las categorias</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('tipoproducto.create') }}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo
            Tipo de producto</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="table table-striped table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($tiposProducto)>0 )
                @foreach ($tiposProducto as $c)
                <tr>
                  <td>{{ $c->id_tipo_producto }}</td>
                  <td>{{ $c->tipo_producto }}</td>
                  <td>
                    <a href="{{ route('tipoproducto.edit',$c->id_tipo_producto) }}" class="btn btn-warning btn-sm">
                      Editar <i class="fa fa-edit"></i> </a>
                  </td>
                  <td>
                    <form action="{{ route('tipoproducto.destroy',$c->id_tipo_producto) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                  </td>
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