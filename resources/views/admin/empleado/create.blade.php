@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    <h1>Crear empleado</h1>
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario de inscripción Empleado</h3>
                    <br>
                    <small>(El RUN será el usuario del empleado)</small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('empleado.store') }}">
                    @csrf
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Run </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="run" value="{{ old('run') }}" placeholder="Ingrese Run de Empleado...." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombres" value="{{ old('nombres') }}" placeholder="Nombre Empleado...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="apellidos" value="{{ old('apellidos') }}" placeholder="Apellidos Empleado...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputNombre" name="telefono" value="{{ old('telefono') }}" placeholder="Ingrese Telefono...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputNombre" name="correo" value="{{ old('correo') }}" placeholder="Ingrese Correo...." required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('empleado.index') }}" class="btn btn-danger pull-left">Volver</a>
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

    </script>
@stop
