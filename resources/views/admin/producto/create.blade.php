@extends('layout.layout')
@section('style')

@stop

@section('contenido')

<section class="content-header">
    <h1>Crear Producto</h1>
</section>
<section class="content">
    <div class="row">
        @include('layout.alerta')

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario de inscripción producto</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('producto.store') }}">
                    @csrf
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre producto</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombre_producto" placeholder="Ingrese nombre producto ...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Descripción</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="descripcion" placeholder="...." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputNombre" name="stock" placeholder="" value="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Stock Cricito</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputNombre" name="stock_critico" placeholder="" value="0" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('producto.index') }}" class="btn btn-danger pull-left">Volver</a>
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
