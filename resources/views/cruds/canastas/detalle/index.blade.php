@extends('layout.layout')
@php
  $detalleCanasta = App\Modelo\DetalleCanasta::where('id_canasta',$canasta->id_canasta)->get();  
  $tiposProductos = App\Modelo\TipoProducto::get();
  
  $dProductos = Array();
  foreach ($tiposProductos as $t) {
    $activo = 1;
    foreach ($detalleCanasta as $d) {      
      if($d->id_tipo_producto==$t->id_tipo_producto){
        $activo = 0;
      }     
    }
    $pro = new App\Modelo\TipoProductoCanasta($t->id_tipo_producto,$t->nombre_tipo,$activo);
    array_push($dProductos,$pro);
  }

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
  <h1>Gestión de Canastas</h1><small>{{ $canasta->nombre_canasta }}</small>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Productos en la canasta</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      	@if (session('info'))
				<div class="alert alert-info">
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
                    @switch($canasta->activo)
                      @case(1)
                        <p class="label-primary">Edición</p>
                        @break
                      @case(2)
                        <p class="label-success">Disponible</p>
                        @break
                      @case(2)
                        <p class="label-danger">No Disponible</p>
                        @break                            
                    @endswitch
                    
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="box-footer">  
          <a href="{{ route('canastas.index') }}" class="btn btn-danger">Volver</a>
        </div>
      </div>
    </div>
    {{-- Añadir Canasta --}}
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Añadir Producto</h3>
        </div>
        <form action="{{ route('detallecanastas.store') }}" method="post">
          {!! csrf_field() !!}
          <input type="text" value="{{ $canasta->id_canasta }}" name="id_canasta" hidden>
          <div class="box-body table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><strong>Nombre Producto:</strong></td>
                  <td>
                    <select class="form-control" name="id_tipo_producto" onChange="buscarTiposProductos()" id="select_tipo" required>                                    
                      @foreach ($dProductos as $dp)
                      @php
                          $class = "";
                          $text = "";
                          if($dp->getActivo()==0){
                            $class = "disabled";
                            $text = "(Ya seleccionado)";
                          }
                      @endphp
                      <option {{ $class }} value="{{ $dp->getId_producto() }}">{{$dp->getNombre()  . " " . $text }}</option>
                      @endforeach
                    </select>  
                  </td>
                </tr>              
                  <td><strong> Nombre:</strong></td>
                  <td><div id="nombre_producto"></div></td>
                </tr>
                <tr>
                  <td><strong> precio:</strong></td>
                  <td><div id="precio_producto"></div></td>
                </tr>
                <tr>
                    <td><strong> Cantidad:</strong></td>
                    <td><input type="number" step="0.5" min="0.5" class="form-control" value="0" id="inputNombre" name="cantidad" placeholder="Ingrese cantidad..." required></td>
                  </tr>
                <tr>  
                <tr>
                  <td><strong> Unidad:</strong></td>
                  <td><div id="unidad_producto"></div></td>
                </tr>            
              </tbody>
            </table>
          </div>
          <div class="box-footer">  
            <button type="submit" class="btn btn-success pull-right">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
    {{-- Table de los productos asociados --}}
    <div class="col-md-6">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Todos los tipos de canastas</h3>          
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
                <th></th>
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
                  <td>{{ $d->cantidadS() . "  ". $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }}</small></td>                
                  <td>{{ $d->cantidadS() . " x " . $d->tipoProducto->dinero_texto()}} <small>({{ $d->tipoProducto->unidad->nombre_unidad }})</small></td>
                  <td>{{ dinero_texto($total) }}</td>
                  <td>
                    {{-- button --}}
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-dangerEdit{{ $d->id_detalle_can }}"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-dangerDelete{{ $d->id_detalle_can }}"><i class="fa fa-trash"></i></button>
                    {{-- Edit --}}
                    <form action="{{route('detallecanastas.update', $d->id_detalle_can )}}" method="post">
                      {!! csrf_field() !!}	
                      {!! method_field('PUT') !!}
                      <div class="modal modal-primary fade" id="modal-dangerEdit{{ $d->id_detalle_can }}" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Editar {{ $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }}</h4>
                            </div>
                            <div class="modal-body">
                              <!-- <p>One fine body…</p> -->
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="form-group md-form md-5">
                                    <label for="inputc1" class="col-md-4 control-label">Cantidad</label>
                                    <div class="col-md-6">
                                      <input type="number" step="0.5" min="0.5" class="form-control" value="{{ $d->cantidad }}" id="inputNombre" name="cantidad" placeholder="Ingrese cantidad..." required>
                                    </div>               
                                  </div>  
                                                
                                </div>
                              </div>                       
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-outline">Guardar Cambios</button>
                            </div>
                          </div>
                        </div>
                      </div>                
                    </form>
                    {{-- Delete --}}                    
                    <form action="{{route('detallecanastas.destroy', $d->id_detalle_can)}}" method="post">
                      {!! csrf_field() !!}	
                      {!! method_field('DELETE') !!}
                      <div class="modal modal-danger fade" id="modal-dangerDelete{{ $d->id_detalle_can }}" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Eliminar {{ $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }}</h4>
                            </div>
                            <div class="modal-body">
                              <!-- <p>One fine body…</p> -->                                                 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-outline">Eliminar</button>
                            </div>
                          </div>
                        </div>
                      </div>                
                    </form>    
                  </td>
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
  </div>
</section>
@stop
@section('scripts')

  <script src="/bower_components/axios/js/axios.min.js"></script>
  <script>
    buscarTiposProductos();
    function buscarTiposProductos(){
      
      var id_tipo = document.getElementById('select_tipo').value;
      var url = '../../api/tiposproductos/' + id_tipo; 
      axios.get(url, {
      responseType: 'json'
      })
        .then(function(res) {
          if(res.status==200) {
            // console.log(res.data);
            document.getElementById('nombre_producto').innerHTML = res.data.nombre_tipo;
            document.getElementById('precio_producto').innerHTML = res.data.precio;
            document.getElementById('unidad_producto').innerHTML = res.data.unidad;
          }
          // console.log(res);
        })
        .catch(function(err) {
          console.log(err);
          // mensaje.innerText = 'Error de conexión ' + err;
        });
    }

  </script>
@stop