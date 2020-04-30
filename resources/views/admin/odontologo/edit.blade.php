@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    <h1>Editar Odontologo</h1>
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')
    
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario para editar Odontologo {{ $od->nombre_completo() }}</h3>
                    <br>
                    <small>(El RUN será el usuario del Odontologo)</small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('odontologo.update',$od->run) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Run </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="run" value="{{ $od->run }}" placeholder="Ingrese Run de Usuario...." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombres" value="{{ $od->nombres }}" placeholder="Nombre Administrador...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="apellidos" value="{{ $od->apellidos }}" placeholder="Apellidos Admnistrador...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputNombre" name="telefono" value="{{ $od->telefono }}" placeholder="Ingrese Telefono...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo</label>
                                <div class="col-sm-10">
                                <input type="odail" class="form-control" id="inputNombre" name="correo" value="{{ $od->correo }}" placeholder="Ingrese Correo...." required>
                            </div>
                        </div>
                       
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('odontologo.index')}}" class="btn btn-danger pull-left">Volver</a>
                        <button type="submit" class="btn btn-success pull-right">Actualizar</button>
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
