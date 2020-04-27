@php
    function dinero_texto($d){
      $numero = (string)$d;
      $puntos = floor((strlen($numero)-1)/3);
      $tmp = "";
      $pos = 1;
      for($i=strlen($numero)-1; $i>=0; $i--){
        $tmp = $tmp.substr($numero, $i, 1);
        if($pos%3==0 && $pos!=strlen($numero))
          $tmp = $tmp.".";
          $pos = $pos + 1;
      }
      $formateado = "$ ".strrev($tmp);
      return $formateado;
    }
     
@endphp
@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Tipos de Productos</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Tipos de Productos</li>
  </ol>
</section>
<section class="content">
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
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los tipos de productos</h3>          
        </div>
        <div class="col-md-12 text-center">      
          <a href="{{ route('tipoproductos.create')}}" class="btn btn-success btn-sm"><i class="fa fa-ticket"></i>&nbsp;Nuevo Tipo de Producto</a>        
     
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table  class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Tipo Unidad</th>
                <th>Valor $</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($tipos)>0 )
                @foreach ($tipos as $t)
                <tr>
                  <td>{{ $t->id_tipo_producto }}</td>
                  <td>{{ $t->nombre_tipo }}</td>
                  <td>{{ $t->unidad->nombre_unidad }}</td>     
                  <td>{{  dinero_texto($t->precio_venta) }}</td>
                  <td>
                    <a href="{{ route('tipoproductos.edit',$t->id_tipo_producto) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp;Editar</a> 
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