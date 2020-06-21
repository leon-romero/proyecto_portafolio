@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Atencion a pacientes</h1>
</section>
<section class="content">
  <div class="row">

    {{-- Alerta de mensaje --}}
    @include('layout.alerta')
    {{-- Alerta de mensaje --}}

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          {{-- <h3 class="box-title">Todos los Servicios</h3> --}}
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Fecha Solicitud</th>
                <th>Código</th>
                <th>Empleado Solicitante</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($ordenes)>0 ) 
              @foreach ($ordenes as $or)
                <tr>
                  <td>{{ $or->codigo }}</td>
                  <td>{{ $or->empleado->nombre_completo() }}</td>
                  <td>
                    <a href="{{ route('proveedor.solicitudes.show',$or->id_orden_empleado) }}" class="btn btn-info btn-sm"> Detalle</a>
                  </td>
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