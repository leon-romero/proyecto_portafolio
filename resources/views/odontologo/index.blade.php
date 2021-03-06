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
                <th></th>
                <th>Hora</th>
                <th>Rut</th>
                <th>Servicio</th>
                <th>Nombre Paciente</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($reservas)>0 ) 
              @foreach ($reservas as $r)
                <tr>
                  <td>
                    @if ($r->id_estado_reserva==1)
                      <strong class="label label-warning">Espera</strong>
                    @else
                      @if ($r->id_estado_reserva==2)
                      <strong class="label label-success">Atendido</strong>
                      @else
                      <strong class="label label-danger">Cancelado</strong>
                      @endif
                    @endif
                  </td>
                  <td>{{ $r->horario->horario }}</td>
                  <td>{{ $r->servicio->nombre_servicio }}</td>
                  <td>{{ $r->cliente->run }}</td>
                  <td>{{ $r->cliente->nombre_completo() }}</td>
                  <td>
                   @if ($r->id_odontologo>0)
                   <a href="{{ route('atencion.show',$r->id_reservar_hora) }}" class="btn btn-info btn-sm">Ver</a>
                   @else
                   <a href="{{ route('atencion.show',$r->id_reservar_hora) }}" class="btn btn-success btn-sm">Atender</a>
                   @endif
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