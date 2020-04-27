@php
    $canastas = App\Modelo\Canasta::where('activo',2)->orderBy('id_tipo_canasta')->get();

    // Iniciar Sesión   
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      $cliente = App\Modelo\Cliente::where('id_cliente',auth('cliente')->user()->id_cliente)->first();
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
  @if ($isLogin)
  <div class="container text-center">
      <h5 id="bienvenido"></h5>
  </div>  
  @endif

  <div class="container my-2">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100"
          src="/img/banner.png"
            alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100"
          src="/img/banner.png"
            alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Bootstrap caption example</h5> --}}
            {{-- <p>Using Bootstrap v4!</p> --}}
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100"
          src="/img/banner.png"
            alt="Third slide">
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="container">
    <!-- Banner -->
    <div class="row">     
    </div>
    <!-- Canastas -->
    <div class="row my-4">
      @foreach ($canastas as $c)
      <div class="col-lg-4 col-md-6 mb-4 ">
        <div class="card h-100">
          @php
          $img = "700x400(pequeña).png";
          switch ($c->id_tipo_canasta) {
            case 2:
              $img = "700x400(mediana).png";
              break;
            case 3:
              $img = "700x400(grande).png";
              break;
          }
          @endphp
          <a href="{{ route('shop.canasta.show',$c->id_canasta) }}"><img class="card-img-top" src="/img/{{$img}}" alt=""></a>
          <div class="card-body">            
            <small>{{ $c->tipoCanasta->nombre }}</small>
            <h4 class="card-title">
              <a href="{{ route('shop.canasta.show',$c->id_canasta) }}"> {{ $c->nombre_canasta }}</a>
            </h4>
            <h5>{{ $c->dinero_texto() }}</h5>
            <p class="card-text">{{ $c->descripcion }}</p>
          </div>
          <div class="card-footer">
            {{-- <a href="" class="btn btn-success btn-block">Ver</a> --}}
            <small class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
          </div>
        </div>
      </div> 
      @endforeach  
    </div>
  </div>
  <!-- /.container -->
  <!-- Footer -->
  <div id="snackbar">Message Ok..</div>
@stop
@section('scripts')
  <script>
    $('.carousel').carousel({ interval: 2000 });

    
    snackbarUp('02 01 2019..');
    // snackbarUp('Fail, wrong data');
 
  </script>
  @if ($isLogin)
  <script>
    var date = new Date();
    var hora = date.getHours();
    var texto="";
    if(hora<12){ texto="Buenos Días ";   }
    if(hora>=12 && hora<18){ texto="Buenas Tardes "; }
    if(hora>=18){ texto="Buenas Noches "; }
    document.getElementById('bienvenido').innerHTML = texto + "{{ $cliente->nombre . " " . $cliente->apellidos }}";
  </script>
  @endif
@stop