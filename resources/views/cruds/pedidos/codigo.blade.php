@php
  $fechaHoy = date("d-m-Y");
@endphp
@section('style')
<link rel="stylesheet" href="bower_components/datepicker/css/bootstrap-datepicker3.css">
@stop
@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Pedidos</h1>
  <ol class="breadcrumb">
    <li><i class="glyphicon glyphicon-list-alt"></i> Lista de Pedidos</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      @if (session('info'))
      <div class="alert alert-danger">
        {{ session('info') }}
      </div>
      @endif
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      <!-- Horizontal Form -->
     <div class="box box-danger">
       <div class="box-header with-border">
           <h3 class="box-title">Buscar por codigo</h3>
       </div>
       <!-- /.box-header -->
       <!-- form start -->
       <form class="form-horizontal" method="POST" action="{{ route('pedidoscodigo.buscar') }}">
           {!! csrf_field() !!}
           <div class="box-body"> 
              <div class="form-group">
                <label for="idcod" class="col-sm-2 control-label">Código</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" autocomplete="off" id="idcod" name="codigo" placeholder="" required>
                </div>
              </div>         
           </div>
           <!-- /.box-body -->
           <div class="box-footer">
               <button type="submit" class="btn btn-success pull-right">Buscar</button>
           </div>
       </form>
     </div>
   </div>
  </div>
</section>
@stop
