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
        {{-- Cambiar perfil --}}
        <div class="card mt-4">
          {{-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> --}}
          <div class="card-body">
            <h3 class="card-title"> Actualizar perfil </h3>
            <small>Id. de usuario : {{ $cliente->token_cliente }}</small>
            {{--<h4> asdasd </h4>
            <p class="card-text"> asdasd </p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            <br><br>
            <a href="#" class="btn btn-success">Solicitar Canasta</a> --}}
            <p><strong>Utilza este formualario para cambiar tus datos personales.</strong><br>Deberás tener en cuenta que estos datos son necesario para saber la veracidad del cliente.</p>
            <hr>          
            <form method="POST" action={{ route('shop.perfil') }}>
              {!! csrf_field() !!}
              <div class="row form-group">
                <div class="col">
                  <label for="formGroupExampleInput">Nombres</label>
                  <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" placeholder="Last name" value="{{ $cliente->nombre }}"  required>
                  {!! $errors->first('nombre', ' <small id="select_nombre" class="form-text text-danger">:message</small>') !!}
                </div>
                <div class="col">
                  <label for="formGroupExampleInput">Apellidos</label>
                  <input type="text" name="apellidos" class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}" placeholder="Last name" value="{{ $cliente->apellidos }}" required>
                  {!! $errors->first('apellidos', ' <small id="select_apellidos" class="form-text text-danger">:message</small>') !!}
                </div>
              </div>
              <div class="row form-group">        
                <div class="col-md-6">
                  <label for="formGroupExampleInput2">Teléfono</label>
                  <input name="telefono" type="text" class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" id="formGroupExampleInput2" placeholder="Another input placeholder"  value="{{ $cliente->telefono }}" required>
                  {!! $errors->first('telefono', ' <small id="select_telefono" class="form-text text-danger">:message</small>') !!}
                </div>
                {{-- <div class="col-md-6">
                  <label for="formGroupExampleInput">Correo</label>
                  <input disabled name="correo" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"  value="{{ $cliente->correo }}">
                </div> --}}
              </div>
              <div class="form-group ">
                <button type="submit" class="btn btn-primary pull-right">Guardar cambios</button>  
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
@stop