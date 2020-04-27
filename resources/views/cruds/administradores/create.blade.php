@extends('layout.layout')

@section('contenido')


<section class="content-header">
    <h1>
        Formulario
        <small>Nuevo Administrador</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('administradores.index') }}"><i class="fa fa-home"></i> Administrador</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario de inscripción administradores</h3>
                    <br>
                    <small>(Las iniciales del correo será el usuario de administradores)</small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('administradores.store') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Usuario </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="username" placeholder="Ingrese Nombre de Usuario...." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputNombre" name="correo" placeholder="Ingrese Correo...." required>
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
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('administradores.index')}}" class="btn btn-danger pull-left">Volver</a>
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
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.js-example-basic-multiple').select2();
    });
</script>
@stop