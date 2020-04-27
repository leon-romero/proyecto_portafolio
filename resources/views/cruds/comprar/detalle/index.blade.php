@extends('layout.layout')
@php
  $detalleCanasta = App\Modelo\DetalleCanasta::where('id_canasta',$canasta->id_canasta)->get();  
  $clientes = App\Modelo\Cliente::get();
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
  <h1> <span class="label-success bg-oscuro label">Paso 1</span><span class="label-success label">Paso 2</span> Detalle Compra <small>{{ $canasta->nombre_canasta }}</small></h1>  
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
          <h3 class="box-title">Canasta</h3>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><strong>Nombre Canasta:</strong></td>
                <td>{{ $canasta->nombre_canasta }}</td>
              </tr>
              <tr>
                <td><strong>Tipo Canasta:</strong></td>
                <td>{{ $canasta->tipoCanasta->nombre }}</td>
              </tr>
              <tr>
                  <td><strong>Fecha Creación:</strong></td>
                  <td>{{  date('d-m-Y', strtotime($canasta->created_at)) }} </td>
              </tr>
              <tr>
                  <td><strong>Valor:</strong></td>
                  <td>{{  $canasta->dinero_texto() }} </td>
              </tr>
              <tr>
                  <td><strong>Estado:</strong></td>
                  <td class="text-center">                  
                    <p class="label-success">Disponible</p>
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="box-footer">  
          <a href="{{ route('compras.index') }}" class="btn btn-danger">Volver</a>
        </div>
    
        <div class="box-header">
          <h3 class="box-title">Detalle canastas</h3>          
        </div>       
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          {{-- <table id="tabla" class="datatable table table-striped table-bordered " cellspacing="0" width="100%"> --}}
          <table class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nombre Producto</th>
                <th>Precio Normal</th>
                <th>Precio Total</th>
              </tr>
            </thead>
            <tbody>
              @if (count($detalleCanasta)>0 )
                @php
                    $totalFinal = 0;
                @endphp
                @foreach ($detalleCanasta as $d)
                @php                          
                    $total = $d->tipoProducto->precio_venta * $d->cantidad;
                    $totalFinal += $total;
                @endphp
                <tr>
                  <td>{{ $d->cantidadS() . " ". $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }}</small></td>                
                  <td>{{ $d->cantidadS() . " x " . $d->tipoProducto->dinero_texto()}} <small>({{ $d->tipoProducto->unidad->nombre_unidad }})</small></td>
                  <td>{{ dinero_texto($total) }}</td>                  
                </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td class="text-right"><strong>Total: </strong></td>
                  <td>{{ dinero_texto($totalFinal) }}</td>                
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{-- Info Cliente --}}
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de Clientes</h3>
        </div>
        <form class="form-horizontal" action="{{ route('compras.checkout') }}" method="post">
          {!! csrf_field() !!}	
          <input type="hidden" name="id_canasta" value="{{ $canasta->id_canasta }}">
          <div class="box-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><strong>Nombre Cliente:</strong></td>
                  <td>
                    <div class="form-group">
                      <select class=" js-example-basic-single form-control" id="id_cliente" name="id_cliente" required onChange="buscarDireccion()">                                    
                        @foreach ($clientes as $c)
                          <option value="{{ $c->id_cliente }}">{{$c->nombre . " " . $c->apellidos}}</option>
                        @endforeach
                      </select>
                    </div>
                  </td>
                </tr>
                <tr>
                    <td><strong>Correo:</strong></td>
                    <td><p id="correo_cliente"></p> </td>
                </tr>
                <tr>
                    <td><strong>Teléfono:</strong></td>
                    <td><p id="telefono_cliente"></p> </td>
                </tr>
              </tbody>
            </table>
          </div>      
          <div class="box-header">
            <h3 class="box-title">Direcciones</h3>   
            <small>(Seleccione una dirección de despacho)</small>       
          </div>       
          <!-- /.box-header -->
          <div class="box-body">
            {{-- <table id="tabla" class="datatable table table-striped table-bordered " cellspacing="0" width="100%"> --}}
            <table id="table_nueva" class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th></th>
                  <th>Dirección - Comuna - Región</th>
                </tr>
              </thead>
              <tbody>                
              </tbody>
            </table>       
          </div>      
          <div class="box-footer">  
            <button type="submit" class="btn btn-success btn-block">Continuar Compra</button>             
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@stop

@section('scripts')
<script>
  buscarDireccion();
	function RemoveRow () {
		var tableHeaderRowCount = 1;
		var table = document.getElementById('table_nueva');
		var rowCount = table.rows.length;
		for (var i = tableHeaderRowCount; i < rowCount; i++) {
			table.deleteRow(tableHeaderRowCount);
		}
		
  }

	function buscarDireccion() {
    var id_cliente = document.getElementById('id_cliente').value;   
    var url = '../../api/clientes/direcciones/' + id_cliente;
         
		fetch(url).then(resp=>{
        return resp.json();
      }).then(result =>{   
        RemoveRow();			
			//	console.log(result);
      var  r = "required";
      $.each(result, function(key,value) {
				var radio = "<input type=\"radio\" name=\"id_direccion\" value=\""+value.id_direccion+"\" "+r+">";
        r ="";
        $('#table_nueva tbody').append(
          '<tr><td>'+radio+'</td><td>'+value.direccion+' - '+value.comuna+' - '+value.region+'</td></tr>'
        )
      });
    });

    var url2 = '../../api/clientes/' + id_cliente;
    fetch(url2).then(resp=>{
        return resp.json();
    }).then(result =>{   
      document.getElementById('correo_cliente').innerHTML = result.correo;
      document.getElementById('telefono_cliente').innerHTML = result.telefono; 
      // console.log(result);
  
    }).catch(console.log);    
  }	
  $('.js-example-basic-single').select2();
</script>
@stop