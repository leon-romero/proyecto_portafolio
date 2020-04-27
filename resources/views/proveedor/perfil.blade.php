@php
  $prov = auth('proveedor')->user();
  $comunas = App\Modelo\Comuna::get();
  $regiones = App\Modelo\Region::get();
@endphp
@extends('proveedor.layout.layout')
@section('contenido')
  <section class="content-header">
          <h1>
            Perfil
            <small>Proveedor</small>
          </h1>
        </section>
        <section class="content">
          <div class="row">         
            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Configuración perfil proveedor</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="">
                  <div class="box-body"> 
                    <div class="form-group">
                      <label for="inputNombre" class="col-sm-2 control-label">Usuario</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNombre" disabled value="{{ $prov->username }}"  placeholder="Nombre Técnico" required>
                      </div>
                    </div>                
                    <div class="form-group">
                      <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNombre" disabled name="nombres" value="{{ $prov->nombre }}"  placeholder="Nombre Técnico" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputCorreo" class="col-sm-2 control-label">Correo</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputCorreo" disabled name="correo" value="{{ $prov->correo }}"  placeholder="Correo Electrónico" required>
                      </div>
                    </div> 
                    <div class="form-group">       
                      <label for="idRegion" class="col-sm-2 control-label">Región</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="select_region" disabled name="region" onChange="CargarComuna()">   
                        </select>
                      </div>
                    </div>
                    <div class="form-group">                  
                      <label for="idComuna" class="col-sm-2 control-label">Comuna</label>
                      <div class="col-sm-10">
                        <select class="form-control" name='id_comuna' disabled id="select_comuna">
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail" class="col-sm-2 control-label">Dirección</label>           
                      <div class="col-sm-10">                  
                      <input type="text" class="form-control" name="direccion" disabled value="{{ $prov->direccion }}" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                      </div>
                    </div>
                      <div class="form-group">
                          <label for="inputNombre" class="col-sm-2 control-label">Teléfono</label>
                          <div class="col-sm-10">
                              <input type="number" class="form-control" id="inputNombre" disabled name="telefono" value="{{ $prov->telefono }}" placeholder="Ingrese Teléfono...." required>
                          </div>
                      </div> 
                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    {{-- <button type="submit" class="btn btn-success pull-right" name="opcion" value="updatePass">Guardar Cambios</button> --}}
                  </div>
                </form>
              </div>
          
            </div>
            <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Cambiar Contraseña</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="{{ route('prov.perfil.password') }}">
                @csrf
                <div class="box-body">              
                  <div class="form-group {{ $errors->has('clave_actual') ? 'has-error' : '' }}">
                    <label for="inputc" class="col-sm-4 control-label">Contraseña actual</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="inputc" autocomplete="off" name="clave_actual"  placeholder="Contraseña actual" title="Requiere 4 a 9 caracteres" maxlength="9"  pattern=".{4,9}" required>
                      {!! $errors->first('clave_actual', '<span class="help-block">:message</span>') !!}
                    </div>               
                  </div>              
                  <div class="form-group {{ $errors->has('clave_nueva') ? 'has-error' : '' }}">
                    <label for="inputc1" class="col-sm-4 control-label">Contraseña nueva</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="inputc1" autocomplete="off" name="clave_nueva" value="" placeholder="Contraseña nueva min 4 max 9" title="Requiere 5 a 9 caracteres" maxlength="9"  pattern=".{4,9}" required>
                      {!! $errors->first('clave_nueva', '<span class="help-block">:message</span>') !!}
                    </div>               
                  </div>   
                  <div class="form-group {{ $errors->has('clave_nueva_repetir') ? 'has-error' : '' }}">
                    <label for="inputc2" class="col-sm-4 control-label">Repetir contraseña</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="inputc2" autocomplete="off" name="clave_nueva_repetir" value="" placeholder="Contraseña nueva min 4 max 9" title="Requiere 5 a 9 caracteres" maxlength="9"  pattern=".{4,9}" required>
                      {!! $errors->first('clave_nueva_repetir', '<span class="help-block">:message</span>') !!}
                    </div>               
                  </div>   
      
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right" name="opcion" value="updatePass">Guardar Cambios</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
          
          </div>
          </div>
        </section>
     
  
        <div id="snackbar">Message Ok..</div>
    
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

CargarRegionUna({{ $prov->comuna->id_region }});      
CargarComunaUna({{ $prov->id_comuna }});

function CargarRegionUna($id){
  var $select = $('#select_region');
  $select.find('option').remove();
  //alert(options);
  $.each(regiones, function(key,value) {
      if (value.id_region==$id) {
        $select.append('<option selected value=' + value.id_region + '>' + value.nombre + ' (x)</option>');
      } else {
        $select.append('<option value=' + value.id_region + '>' + value.nombre + '</option>');
      }            
      
  });
}

function CargarComunaUna($id){
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
    if (value.id==$id) {
      $select.append('<option selected value=' + value.id + '>' + value.nombre + ' (x)</option>');
    } else {
      $select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
    }       
  });
}


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
@if (session('info'))
<script>        
  snackbarUp('{{session('info')}}');
</script>
@endif
@stop