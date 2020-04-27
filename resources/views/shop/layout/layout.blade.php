@php
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      // $nombreUsuario =  auth('cliente')->user()->nombres;
    }
    function activar2($url){
        return request()->is($url) ? 'active' : '';
    }
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rincón Orgánico</title>
  <link href="/assets_shop/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets_shop/css/rinconorganico.css" rel="stylesheet">
  <link href="/assets_shop/css/fontawesome/css/all.css" rel="stylesheet">
  {{-- snackbar --}}
  <link href="/assets_shop/css/snackbar.css" rel="stylesheet">
</head>
<body>
    {{-- nav --}}
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-exito fixed-top"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top">
        <div class="container">
        <a class="navbar-brand" href="/">
            {{-- <img src="/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> --}}
            <img src="/img/footer-logo.png" class="d-inline-block align-top" alt="">
            {{-- Bootstrap
            <i class="fab fa-whatsapp"></i>  --}}
        </a>
        <!-- <a class="navbar-brand" href="/"> Ricon Orgánico</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ activar2('/') }}">
                <a class="nav-link" href="/"><i class="fa fa-home"></i> Inicio</a>
            </li>       
            @if ($isLogin)
            <li class="nav-item {{ activar2('shop/perfil/historial') }}">
                <a class="nav-link" href="{{ route('shop.perfil.historial') }}"><i class="fa fa-list-alt"></i> Historial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ activar2('shop/perfil*') }}" href="{{ route('shop.perfil') }}"> <i class="fa fa-user"></i> Mi Cuenta</a> 
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.salir') }}"> <i class="fa fa-sign-out"></i> Cerrar Sesión</a> 
            </li>   
            @else
            <li class="nav-item">
                <a class="btn btn-" href="{{ route('shop.login') }}"> <i class="fa fa-sign-out"></i> Iniciar Sesión</a> 
                {{-- <a class="btn btn-primary btn-sm" href="login.html">Iniciar Sesión</a> --}}
                
            </li>
            @endif
               
     
            {{-- <li class="nav-item">
                <a class="btn btn-danger btn-sm" href="#"> Cerrar Sesión</a>
                </li>
            </ul> --}}
        </div>
        </div>
    </nav>  
    {{-- end nav --}}

    {{-- start contenido --}}
    @yield('contenido')  
    {{-- end Contenido --}}    
    
    <div class="border-top"></div>
    <div class="container">
        <footer class="pt-4  ">
            <div class="row">
                <div class="col-6 col-md">
                    {{-- <img class="mb-2" src="img/logo.png" alt="" width="24" height="24"> --}}
                    <img class="mb-2" src="/img/rinconorganico.png" class="img-responsive"  width="100px" alt="">
                    <small class="d-block mb-3 text-muted">© 2017-2020</small>
                </div>
                {{-- <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="pricing.htm#">Cool stuff</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Random feature</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Team feature</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Stuff for developers</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Another one</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="pricing.htm#">Resource</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Resource name</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Another resource</a></li>
                        <li><a class="text-muted" href="pricing.htm#">Final resource</a></li>
                    </ul>
                </div> --}}
                <div class="col-6 col-md">
                    <h5>Acerca</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="pricing.htm#">Team</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <footer class="py-2 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Rincón Orgánico</p>
        </div>
    </footer>
    <script src="/assets_shop/vendor/jquery/jquery.min.js"></script>
    <script src="/assets_shop/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script>
        function snackbarUp(message) {
            var x = document.getElementById("snackbar");
            x.innerHTML = message;
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>  
    @yield('scripts')  
</body>
</html>