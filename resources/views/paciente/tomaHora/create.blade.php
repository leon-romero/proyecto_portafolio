@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    <h1>Crear paciente</h1>
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario de inscripción Pacientes</h3>
                    <br>
                    <small>(El RUN será el usuario del paciente)</small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('paciente.store') }}">
                    @csrf
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Run </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="run" placeholder="Ingrese Run de Paciente...." maxlength="9" min="8" onkeyup="this.value = validarRut(this.value)" required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombres" placeholder="Nombre Paciente...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="apellidos" placeholder="Apellidos Paciente...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputNombre" name="telefono" placeholder="Ingrese Telefono...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputNombre" name="correo" placeholder="Ingrese Correo...." required>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Región</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_region" name="region" onChange="CargarComunas()">   
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2 control-label">direccion</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="direccion" placeholder="..." required></textarea>
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
