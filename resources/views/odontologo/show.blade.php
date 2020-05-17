
@php
$estados = array('Espera' => 1, 'Atendido' => 2 , 'Cancelado' => 3 );
@endphp
@extends('layout.layout')
@section('style')

@stop
@section('contenido')
  <section class="content-header">
    <h1>Atención Paciente - <strong>
    @foreach ($estados as $key => $value)
        @if ($value == $r->id_estado_reserva)
            {{ $key }}            
        @endif
    @endforeach
    </strong></h1>
  </section>
  <section class="content">
    <div class="row">
      @include('layout.alerta')
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Paciente {{ $r->cliente->run }}</h3>
            <br>
            <table class="table">
              <tr>
                <td style="width: 25%"><strong>Nombres</strong></td>
                <td>{{ $r->cliente->nombre_completo() }}</td>
              </tr>
              <tr>
                <td style="width: 25%"><strong>Direccion</strong></td>
                <td>{{ $r->cliente->direccion  . ", " . $r->cliente->comuna->nombre_comuna . ", " . $r->cliente->comuna->region->nombre_region . "."}}</td>
              </tr>
              <tr>
                <td style="width: 25%"><strong>Hora Atención</strong></td>
                <td>{{ $r->horario->horario }}</td>
              </tr>
              <tr>
                <td style="width: 25%"><strong>Servicio</strong></td>
                <td>{{ $r->servicio->nombre_servicio }}</td>
              </tr>
              @if ($r->id_estado_reserva==2)
              <tr>
                <td style="width: 25%"><strong>Atendido por</strong></td>
                <td>{{ $r->odontologo->nombre_completo() }}</td>
              </tr>                  
              @endif
            </table>
          </div>
          <form class="form-horizontal" method="post" action="{{ route('atencion.update',$r->id_reservar_hora) }}">
            @csrf
            @method('PUT')
            <div class="box-body">
              @if ($r->id_estado_reserva!=2)
              <div class="form-group col-sm-12">
                <label>Comentario de la Atención</label>
                <textarea class="form-control" rows="3" name="direccion" placeholder="..." required></textarea>
              </div>
              <div class="form-group col-sm-12">
                <label>Estado de la consulta</label>
                <div class="">
                  <select class="form-control" id="id_estado" name="id_estado">
                    
                    @foreach ($estados as $key => $value)
                      @if ($value==$r->id_estado_reserva)
                        <option selected value="{{ $value }}">{{ $key }}</option>   
                      @else
                        <option value="{{ $value }}">{{ $key }}</option>   
                      @endif
                    @endforeach                     
                  </select>
                </div>
              </div>
              @else
              <div class="form-group col-sm-12">
                <label>Comentario de la Atención</label>
                <textarea class="form-control" disabled rows="3" name="direccion" placeholder="..." required>{{ $r->comentario }}</textarea>
              </div>
              @endif
            
            </div>                    
            <div class="box-footer">
                <a href="{{ route('atencion.index') }}" class="btn btn-danger pull-left">Volver</a>
                @if ($r->id_estado_reserva!=2)
                  <button type="submit" class="btn btn-success pull-right">Guardar</button>
                @endif
            </div>
          </form>
        </div>
      </div>
    </div>
</section>
@stop

@section('scripts')

@stop
