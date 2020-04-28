@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    <h1>Editar Proveedor</h1>
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')
    
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario para editar Proveedor {{ $pro->nombre_empresa }}</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('proveedor.update',$pro->id_ficha_proveedor) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Username </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="username" value="{{ $pro->username }}" placeholder="Ingrese Username de Usuario...." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre Empresa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombre_empresa" value="{{ $pro->nombre_empresa }}" placeholder="Nombre Empresa...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Rubro</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="rubro" value="{{ $pro->rubro }}" placeholder="Rubro...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputNombre" name="telefono" value="{{ $pro->telefono }}" placeholder="Ingrese Telefono...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputNombre" name="correo" value="{{ $pro->correo }}" placeholder="Ingrese Correo...." required>
                            </div>
                        </div>
                       

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('proveedor.index')}}" class="btn btn-danger pull-left">Volver</a>
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
