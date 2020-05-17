@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    <h1>Bienvenido</h1>
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Agenda tu hora.</h3>
                    <br>
                    <small></small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('tomadehora.store') }}">
                    @csrf
                    <div class="box-body">                
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Servicio</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_servicio" name="servicio">   
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Fecha Agenda</label>
                            <div class="col-sm-6">
                                <input type="date" id="select_fecha" name="fecha_agenda">   
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Hora Disponible</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_hora" name="hora_disponible">   
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('paciente.index') }}" class="btn btn-danger pull-left">Volver</a>
                        <button type="submit" class="btn btn-success pull-right">Agregar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
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
