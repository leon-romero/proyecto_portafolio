@extends('layout.layout')
@php
  $detalleCanasta = App\Modelo\DetalleCanasta::where('id_canasta',$canasta->id_canasta)->get();  
  
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
  <h1> <span class="label-success bg-oscuro label">Paso 1</span><span class="label-success bg-oscuro label">Paso 2</span><span class="label-success label">Paso 3</span> Detalle Compra <small>{{ $canasta->nombre_canasta }}</small></h1>  
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
            </tbody>
          </table>
        </div>
      
    
        <div class="box-header">
          <h3 class="box-title">Detalle Canasta</h3>          
        </div>       
        <!-- /.box-header -->
        <div class="box-body ">               
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
                  <table class="datatable table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Nombre Producto</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($detalleCanasta)>0 )            
                        @foreach ($detalleCanasta as $d)
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
          <h4 class="pull-right">Total A Pagar <strong>{{$canasta->dinero_texto()}}.-</strong></h4>
        </div>
        {{-- Footer --}}
        <form class="form-horizontal" action="{{ route('compras.store') }}" method="post">
        {!! csrf_field() !!}	
        <div class="box-body">          
          <hr>
          <div class="form-group">                            
            <label for="inputNombre" class="col-sm-2 control-label">Comentario Interno</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="comentario" placeholder="..."></textarea>
            </div>
          </div>
          <div class="form-group">                            
            <label for="inputNombre" class="col-sm-2 control-label">Comentario Cliente</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" name="comentario_cliente" placeholder="..."></textarea>
            </div>
          </div>
        </div>
        <input type="hidden" name="id_canasta" value="{{ $canasta->id_canasta }}">
        <input type="hidden" name="id_cliente" value="{{ $cliente->id_cliente }}">
        <input type="hidden" name="id_direccion" value="{{ $direccion->id_direccion }}">
        <div class="box-footer">  
          <a href="{{ route('compras.show',$canasta->id_canasta) }}" class="btn btn-danger">Volver</a>
          <button type="submit" class="btn btn-success pull-right">Finalizar Orden</button>
        </div>
        </form>        
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