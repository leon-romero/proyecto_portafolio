@php    
  $admin = auth('administrador')->user();
@endphp
@extends('layout.layout')
@section('contenido')

     
        <section class="content-header">
          <h1>
            Perfil
            <small>Administrador</small>
          </h1>
        </section>
        <section class="content">
          <div class="row">  
            <div class="col-md-12">
              @if (session('danger'))
                <div class="alert alert-danger">
                  {{ session('danger') }}
              </div>
              @endif
              @if (session('info'))
              <div class="alert alert-info">
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
                  <h3 class="box-title">Configuración perfil administrador</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="">
                  <div class="box-body"> 
                    <div class="form-group">
                      <label for="inputNombre" class="col-sm-2 control-label">Usuario</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNombre" disabled value="{{ $admin->username }}"  placeholder="Nombre Técnico" required>
                      </div>
                    </div>                
                    <div class="form-group">
                      <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNombre" disabled name="nombres" value="{{ $admin->nombres }}"  placeholder="Nombre Técnico" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputCorreo" class="col-sm-2 control-label">Correo</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputCorreo" disabled name="correo" value="{{ $admin->correo }}"  placeholder="Correo Electrónico" required>
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
              <form class="form-horizontal" method="post" action="{{ route('admin.password') }}">
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
  @stop

@section('scripts')
  @if (session('info'))
  <script>        
    snackbarUp('{{session('info')}}');
  </script>
  @endif
@stop