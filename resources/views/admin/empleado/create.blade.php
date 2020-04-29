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
                <form class="form-horizontal" method="post" action="{{ route('paciente.store') }}">
                    @csrf
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Run </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="run" placeholder="Ingrese Run de Usuario...." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombres" placeholder="Nombre Administrador...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="apellidos" placeholder="Apellidos Admnistrador...." required>
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
                        
                        {{-- <div class="row form-group">
                            <label class="col-sm-2 control-label">Tipo Cliente</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_region" name="region" onChange="CargarComunas()">   
                                </select>
                            </div>
                        </div> --}}
                        <div class="row form-group">

                        <div class="form-group" data-select2-id="13">
                            <label>Minimal</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" data-select2-id="3">Alabama</option>
                                <option data-select2-id="19">Alaska</option>
                                <option data-select2-id="20">California</option>
                                <option data-select2-id="21">Delaware</option>
                                <option data-select2-id="22">Tennessee</option>
                                <option data-select2-id="23">Texas</option>
                                <option data-select2-id="24">Washington</option>
                            </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-uoym-container"><span class="select2-selection__rendered" id="select2-uoym-container" role="textbox" aria-readonly="true" title="Tennessee">Tennessee</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>

                        

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="" class="btn btn-danger pull-left">Volver</a>
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
