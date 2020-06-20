@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Solicitudes</h1>
  {{-- <ol class="breadcrumb"> --}}
    {{-- <li><a href=""><i class="fa fa-home"></i> Home</a></li> --}}
    {{-- <li class="active">Clientes</li> --}}
  {{-- </ol> --}}
</section>
<section class="content">
  <div class="row">

    {{-- Alerta de mensaje --}}
    @include('layout.alerta')
    {{-- Alerta de mensaje --}}

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todas las Solicitudes</h3>
          <a href="{{ route('monitoreo.proveedores') }}" class="btn btn-primary pull-rigth">Crear Solicitud</a>
        </div>
       
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                {{-- <th>Fecha Creación</th> --}}
                <th>Empleado</th>
                <th>Proveedor</th>
                <th>Estado</th>
                <th>Recepción</th>
              </tr>
            </thead>

            <tbody>
              @if (count($solicitudes)>0)

              @foreach ($solicitudes as $s)
                @php
                  $estado = "";
                  $color = "";
                  if($s->enviado == 1){
                    $estado = "Enviado";
                    $color = "bg-success";
                  }else{
                    $estado = "Recibido";
                    $color = "bg-info";
                  }
                @endphp
                <tr>
                  <td>{{ $s->codigo }}</td>
                  <td>{{ $s->empleado->nombre_completo()}}</td>
                  <td>{{ $s->proveedor->nombre_empresa}}</td>
                  <td class="{{ $color }}">{{ $estado }}</td>  
                  <td>  </td>
                </tr>

                @endforeach
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@stop