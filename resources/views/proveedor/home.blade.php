
@php
    $nombreUsuario = "";
    if (auth('proveedor')->check()){
      $nombreUsuario =  auth('proveedor')->user()->nombre;
    }
    // Cantida de productos
    $cantidad = App\Modelo\Producto::where('id_proveedor',auth('proveedor')->user()->id_proveedor)->count();
@endphp
@extends('proveedor.layout.layout')

@section('contenido')

  <section class="content-header">  
    <h2 id="bienvenido"></h2>
  </section>
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <!-- ./col -->
      <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{{ $nombreUsuario }}</h3>
            <h5 class="widget-user-desc"> Proveedor </h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="/img/userprov.jpg" alt="User Avatar">
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  {{-- <h5 class="description-header">3,200</h5> --}}
                  {{-- <span class="description-text">SALES</span> --}}
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{ $cantidad }}</h5>
                  <span class="description-text">Productos</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  {{-- <h5 class="description-header">35</h5> --}}
                  {{-- <span class="description-text">PRODUCTS</span> --}}
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
    </div> 
  </section>

@stop
@section('scripts')
  <script>
    var date = new Date();
    var hora = date.getHours();
    var texto="";
    if(hora<12){ texto="Buenos Días ";   }
    if(hora>=12 && hora<18){ texto="Buenas Tardes "; }
    if(hora>=18){ texto="Buenas Noches "; }
    document.getElementById('bienvenido').innerHTML = texto + "{{ $nombreUsuario }}";
  </script>
@stop