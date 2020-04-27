@php
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      $cliente = App\Modelo\Cliente::where('id_cliente',auth('cliente')->user()->id_cliente)->first();
      // dd($cliente);
      // $nombreUsuario =  auth('cliente')->user()->nombres;
      $comunas = App\Modelo\Comuna::get();
      $regiones = App\Modelo\Region::get();
      $direcciones = App\Modelo\Direccion::where('id_cliente',$cliente->id_cliente)->where('activo',1)->orderBy('created_at','desc')->get();
    }
@endphp
@extends('shop.layout.layout')

@section('contenido')
  <section class="bg-fondo my-2">
    <div class="container">
        <i class="fa fa-map-marker"></i> <strong>Despacho en:</strong>   <br>
      <small><strong>Martes:</strong> Chicureo, Las Condes, Lo Barnechea y Vitacura. | <strong>Viernes:</strong> La Reina, Peñalolén, Ñuñoa y Providencia.</small>
    </div>
  </section>    

  <div class="container">
    <div class="row">
      {{-- Parte 1 --}}
      <div class="col-md-3">
        @include('shop.layout.config')        
      </div>

      {{-- Parte 2 --}}
      <div class="col-md-9">   


        <div class="card mt-4">
          <div class="card-body">
            <h3 class="card-title">Agregar dirección nueva</h3>  
            <hr>
            <form method="POST" action="{{ route('shop.perfil.direcciones') }}">
              {{ csrf_field() }}
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="formGroupExampleInput">Región</label>
                  <select class="custom-select" id="select_region" name="region"   onChange="CargarComunas()">   
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="formGroupExampleInput">Comuna</label>
                  <select class="custom-select {{ $errors->has('id_comuna') ? 'is-invalid' : '' }}" name='id_comuna' id="select_comuna">
                  </select>
                  {!! $errors->first('id_comuna', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="formGroupExampleInput">Dirección</label>
                  <textarea name="direccion" class="form-control {{ $errors->has('direccion') ? 'is-invalid' : '' }}" aria-label="With textarea">{{ old('direccion') }}</textarea>
                  {!! $errors->first('direccion', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="form-group ">
                <button type="submit" class="btn btn-primary pull-right">Guardar cambios</button>  
              </div>
            </form>
          </div>
        </div>

        {{-- Direcciones Cliente --}}
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Domicilios guardados

          </div>
          <div class="card-body">          
            <div class="box-body table-responsive">        
              <h2> </h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      {{-- <th>Fecha Creación</th> --}}
                      <th>Dirección</th>
                      <th>Comuna</th>
                      <th>Región</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($direcciones)>0)
                    @foreach ($direcciones as $d) 
                    @if ($d->activo==1)                
                    <tr>
                      {{-- <td>{{ date('d/m/Y', strtotime($d->created_at))}}</td> --}}
                      <td><small>{{ $d->direccion }}</small></td>
                      <td>{{ $d->comuna->nombre_comuna }}</td>
                      <td>{{ $d->comuna->region->nombre_region}}</td>
                      <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" 
                          data-target="#modalEditar" 
                          data-accion="editar" 
                          data-iddir="{{ $d->id_direccion }}"
                          data-namedir="{{ $d->direccion }}"
                          data-comudir="{{ $d->comuna->id_comuna }}"
                          data-regdir="{{ $d->comuna->region->id_region }}"
                        >
                          <i class="fa fa-edit"></i> Editar
                        </button> 

                        <button class="btn btn-danger btn-sm" data-toggle="modal" 
                          data-target="#modalBorrar" 
                          data-accion="borrar" 
                          data-iddir="{{ $d->id_direccion }}"
                          data-namedir="{{ $d->direccion }}" >
                          <i class="fa fa-trash"></i> Borrar
                        </button>
                       
                      </td>    
                    </tr>
                    @endif  
                    @endforeach   
                    @else
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr> 
                    @endif                                 
                  </tbody>
                </table>
              </div>
            </div>
            {{-- <small class="text-muted pull-right">Publicado el </small> --}}
          </div>
        </div>        
      </div>
    </div>

    {{-- <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
      <form action="{{ route('shop.perfil.agregardir') }}" method="POST">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAccionLabel">Agregar Direccion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="row form-group">
                  <div class="col-md-6">
                    <label for="formGroupExampleInput">Región</label>
                    <select class="custom-select" id="select_region" name="region" onChange="CargarComuna()">   
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="formGroupExampleInput">Comuna</label>
                    <select class="custom-select" name='id_comuna' id="select_comuna">
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col">
                    <label for="formGroupExampleInput">Dirección</label>
                    <textarea name="direccion" class="form-control" aria-label="With textarea">{{ old('direccion') }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Agregar Direccion</button>
            </div>
          </div>
        </div>
      </form>
    </div> --}}



    <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
      <form action="{{ route('shop.perfil.borrardir') }}" method="POST">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAccionLabel">Borrar dirección</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                ¿Seguro que desea borrar dirección?
                <span id="direccionborrar"></span>
              </p>
              {{ csrf_field() }}
              <input type="hidden" name="id_direccion" id="iddireccion">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Borrar</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalAccionLabel" aria-hidden="true">
      <form action="{{ route('shop.perfil.editardir') }}" method="POST">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAccionLabel">Editar dirección</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>¿Seguro que desea editar dirección?</p>
                <span class="dir_name_edit"></span>
              <div class="modal-body">
                {{ csrf_field() }}
                <div class="row form-group">
                  <div class="col-md-6">
                    <label for="formGroupExampleInput">Región</label>
                    <select class="custom-select" id="select_region_edit" name="region" onChange="CargarComunasEdit()">   
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="formGroupExampleInput">Comuna</label>
                    <select class="custom-select" id="select_comuna_edit" name='id_comuna'>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col">
                    <label for="formGroupExampleInput">Dirección</label>
                    <textarea name="direccion" class="form-control dir_name_edit" aria-label="With textarea"></textarea>
                </div>
            </div>
              {{ csrf_field() }}
              <input type="hidden" name="id_direccion" id="iddireccion">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  {{-- Mensajes --}}
  <div id="snackbar">Message Ok..</div>
@stop
@section('scripts')   
  {{-- Mensaje --}}
  @if (session('info'))
  <script>        
    snackbarUp('{{ session('info') }}');
  </script>
  @endif
  
  <script>      
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

      $('#modalBorrar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id_dir = button.data('iddir');
        var dir_name = button.data('namedir');
        var modal = $(this);
        modal.find('#iddireccion').val(id_dir);
        modal.find('#direccionborrar').text(dir_name);
      })

      $('#modalEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);        
        var id_dir = button.data('iddir');
        var dir_name = button.data('namedir');
        var dir_reg = button.data('regdir');
        var dir_com = button.data('comudir');



        var modal = $(this);
        modal.find('#iddireccion').val(id_dir);
        modal.find('.dir_name_edit').text(dir_name);
        CargarRegiones('select_region_edit'); 
        modal.find('#select_region_edit').val(dir_reg);
        CargarComunasEdit();
        modal.find('#select_comuna_edit').val(dir_com);
      })

      CargarRegiones('select_region')
      CargarComunas();

      function CargarRegiones(selectId){
        var select = $('#'+selectId);
        select.find('option').remove();
        //alert(options);
        $.each(regiones, function(key,value) {            
            select.append('<option value=' + value.id_region + '>' + value.nombre + '</option>');
        });
      }

      function CargarComunas(){
        var select = $('#select_comuna');
        select.find('option').remove();
        //alert(options);
        var id_r = document.getElementById("select_region").value;
        var coms = comunas.filter( c => c.id_region==id_r);
        // }result => if(result.id_region==id_r) );
        // console.log(id_r);
        $.each(coms, function(key,value) {            
            select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
        });
      }

      function CargarComunasEdit(){
        var select = $('#select_comuna_edit');
        select.find('option').remove();
        //alert(options);
        var id_r = document.getElementById("select_region_edit").value;
        var coms = comunas.filter( c => c.id_region==id_r);
        $.each(coms, function(key,value) {            
            select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
        });
      }


  </script>
@stop