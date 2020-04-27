@extends('layout.layout')
@php
  $codigo = $pedido->codigo; 
  $detallePedido = App\Modelo\detallePedido::where('id_pedido',$pedido->id_pedido)->get(); 
  $canasta = App\Modelo\Canasta::where('id_canasta',$pedido->id_canasta)->first();
  $cliente = App\Modelo\Cliente::where('id_cliente',$pedido->id_cliente)->first();
  $direccion = App\Modelo\Direccion::where('id_direccion',$pedido->id_direccion)->first();
  $detallePedido = App\Modelo\DetallePedido::where('id_pedido',$pedido->id_pedido)->get();
  function dinero_texto($p){
    $numero = (string)$p;
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
@section('contenido')
<section class="content-header">
  <h1> <span class="label-success label">Orden Confirmada</span> Detalle Compra <small>{{ $canasta->nombre_canasta }}</small></h1>  
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Productos en la canasta</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">   
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
    {{-- Detalle Canasta --}}
    <div class="col-md-6">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-shopping-cart"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Código de Compra</span>
          <span class="info-box-number">{{ $codigo }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Detalle Orden</h3>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><strong>Cliente:</strong></td>
                <td>{{ $cliente->nombre . " " . $cliente->apellidos }}</td>
              </tr>
              <tr>
                <td><strong>Correo:</strong></td>
                <td>{{ $cliente->correo }}</td>
              </tr>
              <tr>
                <td><strong>Teléfono:</strong></td>
                <td>{{ $cliente->telefono }}</td>
              </tr>
              <tr>
                <td><strong>Dirección:</strong></td>
                <td>{{ $direccion->direccion . " - " . $direccion->comuna->nombre_comuna . " - " . $direccion->comuna->region->nombre_region }}</td>
              </tr>
              <tr>
                <td><strong>Tipo Canasta:</strong></td>
                <td>{{ $canasta->tipoCanasta->nombre }}</td>
              </tr>
              <tr>
                <td><strong>Valor:</strong></td>
                <td>{{  $canasta->dinero_texto() }} </td>
              </tr>  
              <tr>
                <td><strong>Comentario:</strong></td>
                <td>{{  $pedido->comentario }} </td>
              </tr>  
              <tr>
                <td><strong>Comentario Cliente:</strong></td>
                <td>{{  $pedido->comentario_cliente }} </td>
              </tr>              
            </tbody>
          </table>
        </div>
      
    
        <div class="box-header">
          <h3 class="box-title">Detalle Canasta</h3>          
        </div>       
        <!-- /.box-header -->
        <div class="box-body table-responsive">               
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-danger">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {{ $canasta->nombre_canasta }}
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <table class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Nombre Producto</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($detallePedido)>0 )            
                        @foreach ($detallePedido as $d)
                        <tr>
                          <td>{{ $d->cantidadS() . "  ". $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }}</small></td>
                        </tr>
                        @endforeach            
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>          
          </div>
          
        </div>
        {{-- Footer --}}
        <div class="box-footer">  
          <a href="{{ route('compras.index') }}" class="btn btn-danger">Volver</a>
         
        </div>      
      </div>
    </div>    
  </div>
</section>
@stop

@section('scripts')
<script>

  $('.js-example-basic-single').select2();
</script>
@stop