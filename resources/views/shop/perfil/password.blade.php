@php
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      $cliente = App\Modelo\Cliente::where('id_cliente',auth('cliente')->user()->id_cliente)->first();
      // dd($cliente);
      // $nombreUsuario =  auth('cliente')->user()->nombres;
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
        {{-- Cambiar contraseña --}}
        <div class="card mt-4">
            {{-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> --}}
          <div class="card-body">
            <h3 class="card-title"> Cambiar contraseña </h3>       
            <p><strong>Utilza este formualario para cambiar tu contraseña.</strong></p>
            <hr>
            <form action="{{ route('shop.perfil.password') }}" method="POST">
              @csrf
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="p0">Contraseña Actual</label>
                  <input name="passwd_actual" type="password" class="form-control" id="p0" placeholder="*********" size="30" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="p1">Nueva Contaraseña</label>
                  <input name="passwd_nueva" type="password" class="form-control" id="p1" placeholder="*********" size="30" required>
                </div>
              </div>
              <div class="row form-group">        
                  <div class="col-md-6">
                    <label for="p2">Confirme nueva contraseña</label>
                    <input name="passwd_confirm" type="password" class="form-control" id="p2" placeholder="*********" size="30" required>
                  </div>
                </div>
                @if (session('error') )
                  <small id="idcorreo1" class="form-text text-danger">{{ session('error') }}</small>
                  @endif
              <div class="form-group ">
                <button class="btn btn-primary pull-right">Guardar cambios</button>  
              </div>
            </form>
          </div>
        </div>      
      </div>
    </div>
  </div>
  
  <div id="snackbar">Message Ok..</div>
@stop
@section('scripts')
@if (session('success'))
<script>        
  snackbarUp('Se ha creado correctamente.');
</script>
@endif
@if (session('danger'))
<script>    
  snackbarUp('Error, Intente nuevamete.');
</script>
@endif
@stop