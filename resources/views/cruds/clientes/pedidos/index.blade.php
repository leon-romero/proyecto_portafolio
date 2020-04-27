@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Pedidos Clientes</h1>
  <ol class="breadcrumb">
    {{-- <li><i class="glyphicon glyphicon-list-alt"></i> Lista de Pedidos</li> --}}
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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Cliente</h3>          
        </div>      
        <div class="box-body table-responsive">
          <table  class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
            <tbody>              
              <tr>
                <td><strong>Nombre</strong></td>
                <td>{{ $c->nombre . " " . $c->apellidos }}</td>    
              </tr>     
              <tr>
                <td><strong>Correo</strong></td>
                <td>{{ $c->correo }}</td>    
              </tr>  
              <tr>
                <td><strong>Teléfono</strong></td>
                <td>{{ $c->telefono }}</td>    
              </tr>          
            </tbody>
          </table>
        </div>     
        <div class="box-footer">
            <a href="{{ route('clientes.index')}}" class="btn btn-danger pull-left">Volver</a>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Todos los pedidos pendientes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm" cellspacing="0" width="100%">
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
                    <a href="{{ route('clientes.pedidos.codigo',[$p->cliente->id_cliente,$p->codigo]) }}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Detalle</a>
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