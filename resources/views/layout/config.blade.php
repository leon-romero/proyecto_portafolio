@php
    function activar($url){
        return request()->is($url) ? 'active' : '';
    }
    function show($url){
        return request()->is($url) ? 'show' : '';
    } 
    $contador_pendientes = 0;

    $tipo_usuario = "";

    if(auth('empleado')->check()){
      $tipo_usuario  = "Empleado";
    }else if(auth('cliente')->check()){
      $tipo_usuario  = "Cliente";

    }else if(auth('odontologo')->check()){
      $tipo_usuario  = "Odontologo";

    }else if(auth('proveedor')->check()){
      $tipo_usuario  = "Proveedor";
    }
@endphp
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/img/admin.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Leonardo</p>
        <a href="/"><i class="fa fa-circle text-success"></i> {{ $tipo_usuario }}</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menú</li>
      <li><a href="/home"><i class="fa fa-home text-red"></i> <span>Home</span></a></li>   

      @if (auth('empleado')->check())
          
      
      <li class="treeview {{ activar('paciente*') }}{{ activar('odontologo*') }}{{ activar('empleado*') }}{{ activar('proveedor*') }}">
        <a>
          <i class="fa fa-users"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">           
          <li class="{{ activar('paciente*') }}"><a href="{{ route('paciente.index') }}"><i class="fas fa-user-astronaut"></i> Paciente</a></li>
          <li class="{{ activar('odontologo*') }}"><a href="{{ route('odontologo.index') }}"><i class="fas fa-tooth"></i> Odontólogo</a></li>
          <li class="{{ activar('empleado*') }}"><a href="{{ route('empleado.index') }}"><i class="far fa-address-card"></i> Empleado</a></li>      
          <li class="{{ activar('proveedor*') }}"><a href="{{ route('proveedor.index') }}"><i class="fas fa-address-book"></i> Proveedor</a></li>
        </ul>
      </li>
      
     

      <li class="treeview {{ activar('servicio*') }}{{ activar('producto*') }}">
        <a>
          <i class="fa fa-cogs"></i> <span>Configuración</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">           
          <li class="{{ activar('servicio*') }}"><a href="{{ route('servicio.index') }}"><i class="fas fa-check-square"></i> Servicio</a></li>
          <li class="{{ activar('producto*') }}"><a href="{{ route('producto.index') }}"><i class="fas fa-boxes"></i> Productos</a></li>
          {{-- <li class="{{ activar('empleado*') }}"><a href="{{ route('empleado.index') }}"><i class="far fa-address-card"></i> Familia</a></li>       --}}
          {{-- <li class="{{ activar('proveedor*') }}"><a href="{{ route('proveedor.index') }}"><i class="fas fa-address-book"></i> Tipo</a></li> --}}
        </ul>
      </li>

     
      
      <li class="treeview {{ activar('paciente*') }}{{ activar('odontologo*') }}{{ activar('empleado*') }}{{ activar('proveedor*') }}">
        <a>
          <i class="fa fa-users"></i> <span>Reportes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">           
          <li class="{{ activar('paciente*') }}"><a href="{{ route('paciente.index') }}"><i class="fas fa-user-astronaut"></i> Boleta de Servicios</a></li>
        </ul>
      </li>

      @endif

      @if (auth('cliente')->check())
      <li class="header">Vista Cliente</li>
      <li><a href="{{route('tomadehora.create')}}"><i class="fa fa-clock text-white"></i> <span>Toma de Hora</span></a></li>   
      <li><a href="{{route('tomadehora.show')}}"><i class="fa fa-home text-white"></i> <span>Historial</span></a></li> 
      @endif
      

      @if (auth('odontologo')->check())
      <li class="header">Atención</li>
      <li class="{{ activar('consultas*') }}"><a href="{{ route('atencion.index') }}"><i class="fa fa-clock text-white"></i> <span>Atención</span></a></li>   
      <li class="{{ activar('consulta/calendario*') }}" ><a href="{{ route('atencion.calendario') }}"><i class="fa fa-calendar text-white"></i> <span>Calendario</span></a></li>   
      <li class="{{ activar('consulta/historial*') }}"><a href="{{ route('atencion.historial') }}"><i class="fa fa-home text-white"></i> <span>Historial</span></a></li> 
      @endif


      @if (auth('empleado')->check())
      <li class="header">Vista Empleado</li>
      <li><a href="/home"><i class="fa fa-clock text-white"></i> <span>Crear Solicitud</span></a></li>   
      <li><a href="/home"><i class="fa fa-home text-white"></i> <span>Historial de solicitud</span></a></li> 
      @endif
      

      @if (auth('proveedor')->check())
      
      <li class="header">Vista Proveedor</li>
      <li><a href="/home"><i class="fa fa-clock text-white"></i> <span>Solicitudes</span></a></li>   
      <li><a href="/home"><i class="fa fa-home text-white"></i> <span>Historial de solicitudes</span></a></li> 
      @endif

      <li><a href="{{ route('login.salir') }}"><i class="fa fa-sign-out"></i> <span>Salir</span></a></li>    
    </ul>
  </section>
</aside>