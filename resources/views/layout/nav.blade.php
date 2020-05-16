<header class="main-header">
  <!-- Logo -->
  <a href="{{ route('home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>L</b>S</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Linda</b>Sonrisa</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">       
        {{-- <li class="dropdown notifications-menu">
          <a href="/" title="Perfil Usuario">
            <i class="fa fa-user">&nbsp;Perfil</i>
            <!-- <span class="label label-warning">10</span> -->
          </a>
        </li> --}}
        <li class="dropdown tasks-menu">
          <a href="{{ route('login.salir') }}" title="Salir">
            <i class="fa fa-sign-out">&nbsp;Cerrar sesión</i>
            <!-- <span class="label label-danger">9</span> -->
          </a>
        </li>
        
      </ul>
    </div>
  </nav>
</header>
@include('layout.config')