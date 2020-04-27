<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>admin lite</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="icon" type="image/ico" href="/favicon.ico">
  <style>
    .imgFondo{
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 35rem;
    padding: 15rem 0;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("/img/fondo.jpg");
    background: linear-gradient(top bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("/img/fondo.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
  }


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
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.colorBlanco{
  color : #FFF;
}

.imgFondo{
  width: 100% !important;
  max-width: 100% !important;
}
  </style>
</head>
<body class="imgFondo text-center">
  
<div class="login-box">
  <div class="login-logo">
    <img src="/img/RinconOrgnanico.png" class="hidden-sm hidden-xs" alt="img" width="100" height="100"> 
    <h1 class="colorBlanco"><b>Rincón</b>Orgánico</h1>   
  </div>
  {{-- <h4 style="color:white;" class="bg-black">Recuperar contraseña</h4> --}}
  <div class="login-box-body">

    <p class="login-box-msg">Recuperar Contraseña</p>
    <form class="form-signin" action="recuperar" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="txtUsuarioRecuperar" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button type="submit" name="opcion" value="recuperar"  class="btn btn-primary btn-block btn-flat">Recuperar</button>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-12">
          <a class="btn btn-danger" href="/">Volver</a>
        </div>
      </div> 
    </form>   
    <br>
  </div>
</div>
<script src="/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/sweetalert/js/sweetalert.min.js"></script>
<script>
    swal({
      title: "¡Hemos enviado un correo!",
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
</body>
</html>
