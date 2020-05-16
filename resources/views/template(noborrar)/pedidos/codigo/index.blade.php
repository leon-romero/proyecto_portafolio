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
        <form class="form-horizontal" method="post" action="{{ route('pedidos.verPedidos') }}">
            {!! csrf_field() !!}
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
    <div class="col-md-6">
      <!-- Horizontal Form -->
     <div class="box box-danger">
       <div class="box-header with-border">
           <h3 class="box-title">Buscar por codigo</h3>
       </div>
       <!-- /.box-header -->
       <!-- form start -->
       <form class="form-horizontal" method="post" action="{{ route('pedidos.verPedidosCodigo') }}">
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
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Todos los Pedidos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>Código</th>
                <th>Fecha</th>
                <th>Tipo Canasta</th>
                <th>Nombre Canastas</th>
                <th>Cliente</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($pedidos)>0 )      
              @foreach ($pedidos as $p)               
                <tr>   
                  <td class="text-center">
                    @switch($p->id_estado_pedido)
                      @case(1)
                        <p class="label-warning">Pendiente</p>
                        @break
                      @case(2)
                        <p class="label-primary">Pagado</p>
                        @break
                      @case(3)
                        <p class="label-danger">Cancelado</p>
                        @break
                      @case(4)
                        <p class="label-success">Entregado</p>
                        @break                              
                    @endswitch
                  </td>          
                  <td>{{ $p->codigo }}</td>
                  <td>{{ date('d-m-Y H:m', strtotime($p->created_at)) }}</td>
                  <td>{{ $p->canasta->tipoCanasta->nombre }}</td> 
                  <td>{{ $p->canasta->nombre_canasta }}</td>
                  <td>{{ $p->cliente->nombre . " " . $p->cliente->apellidos }}</td>
                  <td>
                    <a href="{{ route('pedidos.edit',$p->codigo) }}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Detalle</a>
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