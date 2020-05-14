@php
    function activar($url){
        return request()->is($url) ? 'active' : '';
    }
    function show($url){
        return request()->is($url) ? 'show' : '';
    } 
    $contador_pendientes = 0;
@endphp
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/img/admin.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Leonardo</p>
        <a href="/"><i class="fa fa-circle text-success"></i> Administrador</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menú</li>
      <li><a href="/home"><i class="fa fa-home text-red"></i> <span>Home</span></a></li>   

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


      <li class="treeview {{ activar('paciente*') }}{{ activar('odontologo*') }}{{ activar('empleado*') }}{{ activar('proveedor*') }}">
        <a>
          <i class="fa fa-users"></i> <span>Configuración</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">           
          <li class="{{ activar('paciente*') }}"><a href="{{ route('paciente.index') }}"><i class="fas fa-user-astronaut"></i> Servicio</a></li>
          <li class="{{ activar('odontologo*') }}"><a href="{{ route('odontologo.index') }}"><i class="fas fa-tooth"></i> Productos</a></li>
          <li class="{{ activar('empleado*') }}"><a href="{{ route('empleado.index') }}"><i class="far fa-address-card"></i> Familia</a></li>      
          <li class="{{ activar('proveedor*') }}"><a href="{{ route('proveedor.index') }}"><i class="fas fa-address-book"></i> Tipo</a></li>
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


      <li class="header">Vista Paciente</li>
      <li><a href="/home"><i class="fa fa-clock text-white"></i> <span>Toma de Hora</span></a></li>   
      <li><a href="/home"><i class="fa fa-home text-white"></i> <span>Historial</span></a></li> 
      

      
      <li class="header">Vista odontologo</li>
      <li><a href="/home"><i class="fa fa-clock text-white"></i> <span>Calendario</span></a></li>   
      <li><a href="/home"><i class="fa fa-home text-white"></i> <span>Historial</span></a></li> 



      <li class="header">Vista Empleado</li>
      <li><a href="/home"><i class="fa fa-clock text-white"></i> <span>Crear Solicitud</span></a></li>   
      <li><a href="/home"><i class="fa fa-home text-white"></i> <span>Historial de solicitud</span></a></li> 
      

      
      <li class="header">Vista Proveedor</li>
      <li><a href="/home"><i class="fa fa-clock text-white"></i> <span>Solicitudes</span></a></li>   
      <li><a href="/home"><i class="fa fa-home text-white"></i> <span>Historial de solicitudes</span></a></li> 
      
      {{-- <li><a href="/home"><i class="fa fa-home text-red"></i> <span>Home</span></a></li>    --}}

      {{-- <li class="treeview {{ activar('pendientes*') }}{{ activar('pedidosfecha*') }}{{ activar('pedidoscodigo*') }}">
        <a>
          <i class="fa fa-arrow-right"></i> <span>Pedidos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ activar('pendientes*') }}">
            <a href=""><i class="glyphicon glyphicon-list-alt"></i>Pendientes
              <span class="pull-right-container">
                <small class="label pull-right bg-red">{{ $contador_pendientes }}</small>
              </span>
            </a>
          </li>
          <li class="{{ activar('pedidosfecha*') }}"><a href=""><i class="fa fa-calendar"></i>Buscar Fecha</a></li>
          <li class="{{ activar('pedidoscodigo*') }}"><a href=""><i class="fa fa-code"></i>Buscar Código</a></li>
        </ul>
      </li>
      <li class="treeview {{ activar('clientes*') }}{{ activar('proveedores*') }}{{ activar('administradores*') }}">
        <a>
          <i class="fa fa-user-o"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ activar('clientes*') }}"><a href=""><i class="fa fa-user"></i>Clientes</a></li>
          <li class="{{ activar('proveedores*') }}"><a href=""><i class="fa fa-cubes"></i>Proveedores</a></li>
          <li class="{{ activar('administradores*') }}"><a href=""><i class="fa fa-desktop"></i>Administradores</a></li>
        </ul>
      </li>
      <li class="treeview {{ activar('canastas*') }} ">
        <a>
          <i class="fa fa-shopping-basket"></i> <span>Canastas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ activar('canastas*') }}"><a href=""><i class="fa fa-shopping-basket"></i>Canastas</a></li>
        </ul>
      </li>
      <li class="treeview {{ activar('productos*') }}{{ activar('tipoproductos*') }}">
        <a>
          <i class="glyphicon glyphicon-barcode"></i> <span>Productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ activar('tipoproductos*') }}"><a href=""><i class="glyphicon glyphicon-barcode"></i>Tipos de Productos</a></li>
        
          <li class="{{ activar('productos*') }}"><a href=""><i class="glyphicon glyphicon-barcode"></i>Productos</a></li>
        </ul>
      </li>
      <li class="header">Gestión</li>
      <li class="treeview {{activar('tipocanastas*')}}{{activar('unidades*')}}">
        <a>
          <i class="glyphicon glyphicon-barcode"></i> <span>Configuración</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ activar('tipocanastas*') }}"><a href=""><i class="glyphicon glyphicon-list-alt"></i>Tipos de Canastas</a></li>
          <li class="{{ activar('unidades*') }}"><a href=""><i class="fa fa-calculator"></i>Unidades</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a>
          <i class="fa fa-bar-chart"></i> <span>Estadísticas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
         <li class=""><a href=""><i class="fa fa-money"></i>Movimientos</a></li>
         <li class=""><a href=""><i class="fa fa-money"></i>Movimientos</a></li>
        </ul>
      </li>    --}}

      <li><a href="/"><i class="fa fa-sign-out"></i> <span>Salir</span></a></li>    
    </ul>
  </section>
</aside>