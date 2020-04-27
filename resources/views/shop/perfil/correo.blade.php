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
        {{-- Cambiar email --}}
        <div class="card mt-4">
          {{-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> --}}
          <div class="card-body">
            <h3 class="card-title"> Cambiar email </h3>       
            <p><strong>Utilza este formulario para cambiar tu dirección de correo electrónico.</strong></p>
              {{-- <br>Deberás confirmar tu nueva dirección en un correo electrónico que te enviamos.</p> --}}
            <hr>
            <form action="{{ route('shop.perfil.email') }}" method="POST">
              @csrf            
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="c1">Dirección de correo electrónico actual</label>
                  <input type="email" class="form-control" disabled placeholder="" value="{{ $cliente->correo }}" >
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label for="c2">Nueva dirección de correo electrónico</label>
                  <input type="email" class="form-control {{ $errors->has('email_nuevo') ? 'is-invalid' : '' }}" id="email_nuevo" placeholder="" name="email_nuevo" value="{{ old('email_nuevo')}}"   onkeyup="validarCorreo(this.value)" size="30" required>
                  {!! $errors->first('email_nuevo', ' <small id="idcorreo1" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="row form-group">        
                <div class="col-md-6">
                  <label for="c3">Confirmar la dirección de correo electrónico</label>
                  <input type="email" class="form-control {{ $errors->has('email_confirmar') ? 'is-invalid' : '' }}" id="d3" placeholder="" name="email_confirmar" value="{{ old('email_confirmar')}}"  onkeyup="validarCorreo(this.value)" size="30" required>
                  {!! $errors->first('email_confirmar', ' <small id="idcorreo2" class="form-text text-danger">:message</small>') !!}
                  @if (session('error') )
                  <small id="idcorreo1" class="form-text text-danger">{{ session('error') }}</small>
                  @endif
                </div>
              </div>
              
              <div class="form-group ">
                <button id="btnGuardar" class="btn btn-primary pull-right">Guardar cambios</button>  
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
  snackbarUp('Se ha actualizado.');
</script>
@endif
@if (session('danger'))
<script>    
  snackbarUp('Error, Intente nuevamete.');
</script>
@endif
<script>  

  // let correo = '{{ $cliente->correo }}';
  // var btn = document.getElementById('btnGuardar');
  // btn.setAttribute('disabled',true);

  function validarCorreo(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(email)){
      console.log('valida');
    } else {
      console.log('no valida');
    }
  }

  

  // btn.removeAttribute('disabled');


</script>
@stop