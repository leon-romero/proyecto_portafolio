@php
    // $nombreUsuario = "";
    // if (auth('administrador')->check()){
    //   $nombreUsuario =  auth('administrador')->user()->nombres;
    // }else{
    //   header("Location: / ");
    //   // header('Location: 404 ', true, 404);

    // }
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Linda Sonrisa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/ico" href="/favicon.ico">
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Datatables -->
  <link href="/bower_components/dataTables/css/jquery.dataTables.min.css" rel="stylesheet">
  {{-- Select2 --}}
  <link href="/bower_components/select2/css/select2.min.css" rel="stylesheet">
  {{-- RinconOrganico --}}
  <link href="/dist/css/style.css" rel="stylesheet">
  {{-- snackbar --}}
  <link href="/assets_shop/css/snackbar.css" rel="stylesheet">
  <style>
    .label {
      margin-right: 1px;
    }
  </style>
  {{-- insertar codigo style --}}
  @yield('style')	
</head>
<body class="hold-transition skin-green sidebar-mini">
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