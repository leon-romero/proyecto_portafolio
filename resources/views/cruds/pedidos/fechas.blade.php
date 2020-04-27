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
    <div class="col-md-12">
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
    </div>
    <div class="col-md-6">
       <!-- Horizontal Form -->
      <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Buscar por fechas</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="GET" action="{{ route('pedidosfecha.buscar') }}">
            {{-- {!! csrf_field() !!} --}}
            <div class="box-body">     
              <div class="form-group" id="data_1">
                <label class="col-md-3 control-label">Fecha inicio:</label>
                <div class="input-group date col-sm-5">
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                  <input type="text" class="form-control pull-right" name="fecha_inicio" id="datepicker1" required value="{{ $fechaHoy }}">
                </div>
              </div>
              <div class="form-group" id="data_2">
                <label class="col-md-3 control-label">Fecha Termino:</label>
                <div class="input-group date col-sm-5">
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                  <input type="text" class="form-control pull-right" name="fecha_termino" id="datepicker2" required value="{{ $fechaHoy }}">
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
@section('scripts')
<script src="bower_components/datepicker/js/bootstrap-datepicker.min.js"></script>  
<script src="bower_components/datepicker/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script>
  $('#data_1 .input-group.date').datepicker({
    language: "es",
    format: 'dd-mm-yyyy',
    // startDate: '0d',
    // startDate: new Date('2019-01-01'),
    // endDate: new Date('2019-12-24'),
    orientation: "bottom",
    autoclose: true    
  });
  $('#data_2 .input-group.date').datepicker({
    language: "es",
    format: 'dd-mm-yyyy',
    // startDate: '0d',
    // startDate: new Date('2019-01-01'),
    // endDate: new Date('2019-12-24'),
    orientation: "bottom",
    autoclose: true    
  });   
</script>
@stop