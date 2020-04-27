@php
    $comunas = App\Modelo\Comuna::get();
    $regiones = App\Modelo\Region::get();
@endphp
@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Detalles clientes</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Cliente</li>
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
          <h3 class="box-title">Cliente</h3>          
        </div>
        {{-- <div class="col-md-12 text-center">          
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-dangerCategoria"><i class="fa fa-check-square"></i>&nbsp;Nueva Dirección</button>
         
            <div class="modal modal-success fade" id="modal-dangerCategoria" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Crear nueva dirección</h4>
                  </div>
        
                </div>
              </div>
            </div>        
        </div>
        <br>
        <br> --}}
        <!-- /.box-header -->
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
        <div class="box-body table-responsive">
          <table  class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
            <thead>
              <tr>
                {{-- <th>Región</th>
                <th>Comuna </th> --}}
                <th>Dirección</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($direcciones)>0 )
                @foreach ($direcciones as $d)
                @php
                  if ($d->activo ==0){
                    continue;
                  }
                @endphp
                <tr>
                  
                  <td>{{ $d->direccion . ", ".$d->comuna->nombre_comuna.", ". $d->comuna->region->nombre_region  }}</td>  
                  {{-- <td>{{ $d->comuna->region->nombre_region }} </td>
                  <td>{{ $d->comuna->nombre_comuna }}</td>
                  <td>{{ $d->direccion }}</td>   --}}
                  <td>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger{{ $d->id_direccion }}"><i class="fa fa-trash"></i></button>
                    <form action="{{route('direcciones.eliminar')}}" method="post">
                      {!! csrf_field() !!}	   
                      <input type="text" name="id_cliente" value="{{ $c->id_cliente }}" hidden id="">
                      <input type="text" name="id_direccion" value="{{ $d->id_direccion }}" hidden id="">
                      <div class="modal modal-danger fade" id="modal-danger{{ $d->id_direccion }}" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Eliminar Dirección</h4>
                            </div>
                            <div class="modal-body">
                              <p>¿Desea eliminar la dirección {{ $d->direccion }}?</p>                     
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
              @endif
            </tbody>
          </table>
        </div>
        <div class="box-footer">
            <a href="{{ route('clientes.index')}}" class="btn btn-danger pull-left">Volver</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Nueva Dirección</h3>          
          </div>         
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{route('direcciones.store')}}" method="post">
              {!! csrf_field() !!}	
              <div class="modal-body">                      
                <input type="text" name="id_cliente" value="{{ $c->id_cliente }}" hidden id="">
                <div class="form-group">       
                  <label for="idRegion">Región</label>
                  <select class="form-control" id="select_region" name="region" onChange="CargarComuna()">   
                  </select>
                </div>
                <div class="form-group">                  
                  <label for="idComuna">Comuna</label>
                  <select class="form-control" name='id_comuna' id="select_comuna">
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail">Dirección</label>                             
                  <input type="text" class="form-control" name="direccion" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Agregar</button>
              </div>              
            </form>
          </div>
        </div>
      </div>  
  </div>
</section>
@stop
@section('scripts')

<script>
    
    $('.js-example-basic-single').select2();
    // $('.js-example-basic-multiple').select2();
   

 var comunas = [
  @foreach ($comunas as $c)
    {'nombre':'{{ $c->nombre_comuna }}','id':'{{ $c->id_comuna }}','id_region':'{{ $c->id_region}}'},
  @endforeach
];
var regiones = [
  @foreach ($regiones as $r)
    {'nombre':'{{ $r->nombre_region }}','id_region':'{{ $r->id_region }}'},
  @endforeach
];

CargarRegion();      
CargarComuna();

function CargarRegion(){
  var $select = $('#select_region');
  $select.find('option').remove();
  //alert(options);
  $.each(regiones, function(key,value) {            
      $select.append('<option value=' + value.id_region + '>' + value.nombre + '</option>');
  });
}

function CargarComuna(){
  var $select = $('#select_comuna');
  $select.find('option').remove();
  //alert(options);
  var id_r = document.getElementById("select_region").value;
  var coms = comunas.reduce( function(salida, xx){
    if(xx.id_region==id_r){
      salida.push(xx);
    }
    return salida;
  },[]);
  // }result => if(result.id_region==id_r) );
  // console.log(id_r);
  $.each(coms, function(key,value) {            
      $select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
  });
}

</script>
@stop