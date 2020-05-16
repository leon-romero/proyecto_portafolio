@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    {{-- <h1>Crear empleado</h1> --}}
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario de Servicios</h3>
                    <br>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('servicio.update',$s->id_servicio) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-4 control-label">Nombre Servicio</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputNombre" name="nombre_servicio" value="{{ $s->nombre_servicio }}" placeholder="Ingrese nombre de servicio...." required>
                            </div>
                        </div>    
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('servicio.index') }}" class="btn btn-danger pull-left">Volver</a>
                        <button type="submit" class="btn btn-success pull-right">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@stop

@section('scripts')
    <script>

    </script>
@stop
