@php
    $canastas = App\Modelo\Canasta::where('activo',2)->orderBy('id_tipo_canasta')->get();
    $detalleCanasta = App\Modelo\DetalleCanasta::where('id_canasta',$c->id_canasta)->get(); 
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
    }
    $code="CP-";
    $img = "700x400(pequeña).png";
    switch ($c->id_tipo_canasta) {
      case 2:
        $img = "700x400(mediana).png";
        $code="CM-";
        break;
      case 3:
        $img = "700x400(grande).png"; 
        $code="CG-";
        break;
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
    <ol class="breadcrumb bg-white justify-content-end">
      <li class="breadcrumb-item"><a href="/">Canastas</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $c->nombre_canasta }}</li>
    </ol>
    <div class="row">
      {{-- <div class="col-lg-3">
        <h1 class="my-4">Canastas</h1>
        <div class="list-group">
          @php
            function activar($url){
                return request()->is($url) ? 'active' : '';
            }
          @endphp
          @foreach ($canastas as $ca)
            <a href="{{ route('shop.canasta.show',$ca->id_canasta) }}" class="list-group-item {{ activar('shop/canasta/'.$ca->id_canasta) }}">{{ $ca->nombre_canasta }}</a>
          @endforeach
          
        </div>
      </div> --}}
      <!-- /.col-lg-3 -->
      <div class="col-md-12">
        <div class="card border-success">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img class="card-img mx-auto img-fluid img-thumbnail my-2" src="/img/{{ $img }}" alt="">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title">{{ $c->nombre_canasta }}</h3>   
                {{--  &#9734; --}}{{-- 5.0 estrellas --}}
                <small class="font-weight-light text-muted"> CANASTA CODE : {{$code . $c->id_canasta }} </small>
                <br>
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
             
                <h4>{{ $c->dinero_texto() }}.-</h4>
                <small class="card-text">{{ $c->descripcion_larga }}</small>
                <hr>
          
                @if ($isLogin)
                <a href="{{ route('shop.detalle',$c->id_canasta) }}" class="btn btn-success">Solicitar Canasta</a>
                @else
                <a href="{{ route('shop.login') }}" class="btn btn-secondary">Iniciar sesión para solicitar</a>
                @endif
              </div>
              <div class="card-body">
          
                <div class="box-body table-responsive">
                  {{-- <table id="tabla" class="datatable table table-striped table-bordered " cellspacing="0" width="100%"> --}}
                  <table class="datatable table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Detalles</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($detalleCanasta)>0 )
                        @php
                            $totalFinal = 0;
                        @endphp
                        @foreach ($detalleCanasta as $d)                     
                        <tr>
                          <td>{{ $d->cantidadS() . "  ". $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }}</small></td>
                        </tr>
                        @endforeach                      
                      @endif
                    </tbody>
                  </table>
                </div>
                <small class="text-muted">Publicado el {{ date('d/m/Y', strtotime($c->created_at))}}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      {{-- <div class="col-md-12 my-3">
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Comentarios
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
@stop
@section('scripts')
  <script>
    $('.carousel').carousel({ interval: 2000 });
  </script>
@stop