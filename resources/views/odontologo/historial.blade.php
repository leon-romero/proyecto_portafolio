@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Historial atención paciente</h1>
</section>
<section class="content">
  <div class="row">

    {{-- Alerta de mensaje --}}
    @include('layout.alerta')
    {{-- Alerta de mensaje --}}
    <div class="col-md-6">
      <!-- Horizontal Form -->
      <div class="box box-danger">
          <div class="box-header with-border">
              <h3 class="box-title">Buscar Paciente</h3>
              <br>
              {{-- <small>(El RUN será el usuario del paciente)</small> --}}
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="{{ route('atencion.historial.buscar') }}">
              @csrf
              <div class="box-body">  
                  <div class="form-group">
                      <label for="inputNombre" class="col-sm-2 control-label">Run </label>
                          <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputNombre" name="run" placeholder="Ingrese Run de Paciente...." maxlength="9" min="8" onkeyup="this.value = validarRut(this.value)" required>
                      </div>
                  </div>    
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  {{-- <a href="{{ route('.index') }}" class="btn btn-danger pull-left">Volver</a> --}}
                  <button type="submit" class="btn btn-success pull-right">Buscar</button>
              </div>
          </form>
      </div>

    </div>
  </div>
  
  @if (!empty($c))
      

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Paciente {{ $c->run }}</h3>
          <br>
          <table class="table">
            <tr>
              <td style="width: 25%"><strong>Nombres</strong></td>
              <td>{{ $c->nombre_completo() }}</td>
            </tr>
            <tr>
              <td style="width: 25%"><strong>Direccion</strong></td>
              <td>{{ $c->direccion  . ", " . $c->comuna->nombre_comuna . ", " . $c->comuna->region->nombre_region . "."}}</td>
            </tr>                
          </table>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Servicio</th>
                {{-- <th>Rut</th> --}}
                {{-- <th>Nombre Paciente</th> --}}
                <th>Odotólogo</th>
                <th>Comentario Atención</th>
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
                  <td>{{ $r->fecha() }}</td>
                  <td>{{ $r->horario->horario }}</td>
                  <td>{{ $r->servicio->nombre_servicio }}</td>
                  {{-- <td>{{ $r->cliente->run }}</td> --}}
                  {{-- <td>{{ $r->cliente->nombre_completo() }}</td> --}}
                  <td>
                    @if (!empty($r->odontologo))
                      {{ $r->odontologo->nombre_completo() }}
                    @else
                      no asignado
                    @endif
                  </td>
                  <td>
                    @if (!empty($r->comentario))
                      {{ $r->comentario }}
                    @else
                        -- 
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
  @endif
</section>
@stop
@section('scripts')
    <script>
      function validarRut(string) {//solo letras y numeros
            var out = '';
            //Se añaden las letras validas
            var filtro = '1234567890Kk';//Caracteres validos

            for (var i = 0; i < string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1)
                out += string.charAt(i).toUpperCase();
            return out;
        }
    </script>
@stop