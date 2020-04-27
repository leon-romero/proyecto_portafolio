@php
    function activar($url){
        return request()->is($url) ? 'active' : '';
    }
    function show($url){
        return request()->is($url) ? 'show' : '';
    }
@endphp
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/img/userprov.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
      @if (auth('proveedor')->check())        
        <p>{{  auth('proveedor')->user()->nombre }}</p>
      @endif
      {{-- <p>Nicolás</p> --}}
        <a href="/perfil"><i class="fa fa-circle text-success"></i> Proveedor</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menú</li>
      <li class="{{ activar('prov/home*') }}"><a href="{{route('prov.home')}}"><i class="fa fa-home text-blue"></i> <span>Inicio</span></a></li>    
      <li class="{{ activar('prov/productos*') }}"><a href="{{ route('prov.productos') }}"><i class="glyphicon glyphicon-barcode text-green"></i> <span>Productos</span></a></li>   
      <li><a href="{{ route('login.salir') }}"><i class="fa fa-sign-out"></i> <span>Salir</span></a></li>    
    </ul>
  </section>
</aside>