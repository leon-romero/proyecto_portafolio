
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Rincón Orgánico</title>
    <!-- Bootstrap core CSS -->
    {{-- <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <link href="/assets_shop/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets_shop/css/rinconorganico.css" rel="stylesheet">
    <link href="/assets_shop/css/fontawesome/css/all.css" rel="stylesheet">
    <style>
        html,
        body {
        height: 100%;
        }

        body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }
        .form-signin .checkbox {
        font-weight: 400;
        }
        .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
        }
        .form-signin .form-control:focus {
        z-index: 2;
        }
        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
      }


    </style>
 
  </head>
  <body class="">   
    <form class="form-signin" action="{{ route('auth.recuperar') }}" method="post"> 
      @csrf      
      <img class="mb-4 mx-auto d-block" src="/img/RinconOrgnanico.png" alt="" width="100px" height="100px">
      {{-- <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1> --}}
      <h1 class="h3 mb-3 text-center font-weight-normal"><b>Rincón</b>Orgánico</h1>
      <span class="badge badge-danger my-2 mb-2">Recuperar Contraseña</span>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" id="inputPassword" name="correo" placeholder="Correo Electrónico" autocomplete="off" required>
      {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger text-center">:message</small>') !!}
      <br>
      <button type="submit" class="btn btn-md btn-primary btn-block" type="submit">Recuperar</button>
      <br>
      <a href="/" class="my-2 float-right">Volver</a>
      <p class="mt-5 mb-3 text-center text-muted">&copy; 2020</p>
    </form>
    {{-- version 02-01-2020 --}}
    <script src="/dist/jquery.min.js"></script>
    <script src="bower_components/sweetalert/js/sweetalert.min.js"></script>
    @if (session('success'))
    <script>
        swal({
          title: "¡Se ha enviado un correo!",
          text: "",
          icon: "success",
          button: {
            text: "OK",
            value: null,
            visible: true,
            className: "btn-success",
            closeModal: true
          }
        });
    </script>
    @endif
    @if (session('danger'))
       <script>
        swal({
          title: "¡Error. Intente Nuevamente!",
          text: "",
          icon: "warning",
          button: {
            text: "OK",
            value: null,
            visible: true,
            className: "btn-danger",
            closeModal: true
          }
        });
    </script>
    @endif
</body>
</html>
