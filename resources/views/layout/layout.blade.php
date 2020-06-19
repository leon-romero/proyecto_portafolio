<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Linda Sonrisa</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/aef2b90f5f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="/bower_components/dataTables/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="/bower_components/select2/css/select2.min.css" rel="stylesheet">
  <link href="/dist/css/style.css" rel="stylesheet">
  <style>
    .label {
      margin-right: 1px;
    }
  </style>
  @yield('style')	
</head>
@php
  $color = "skin-green";
  if (auth('empleado')->check()) {
    $color = "skin-blue";
  } else {
    if (auth('odontologo')->check()) {
      $color = "skin-purple";
    } else {
      if (auth('cliente')->check()) {
        $color = "skin-black";
      } else {
        $color = "skin-yellow";
      }
    }
  }
@endphp
<body class="hold-transition {{ $color }} sidebar-mini">
  <div class="wrapper">    
    {{-- barra de navegacion --}}
    @include('layout.nav')

    {{-- contenido --}}
    <div class="content-wrapper">
       @yield('contenido')
    </div>
    {{-- end contenido --}}

    {{-- pie de pagina --}}
    @include('layout.footer')
    {{-- end pie de pagina --}}

  </div>
  <script src="/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/dist/js/adminlte.min.js"></script>
  <script src="/bower_components/dataTables/js/jquery.dataTables.js"></script>  
  <script>
    $('#table').DataTable({ responsive: true });
    $('#table').attr('style', 'border-collapse: collapse !important');
  </script>
  <script src="/bower_components/dataTables/js/script.js"></script>
  <script src="/bower_components/select2/js/select2.full.min.js"></script>
  <script>
    function snackbarUp(message) {
        var x = document.getElementById("snackbar");
        x.innerHTML = message;
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>  

  {{-- Agregar scripts --}}
  @yield('scripts')	

</body>

</html>