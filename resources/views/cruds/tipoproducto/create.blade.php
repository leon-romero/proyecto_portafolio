@extends('layout.layout')

@section('contenido')


<section class="content-header">
    <h1>
        Categoria
        <small>Agregar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo tipo de producto</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('tipoproducto.store') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Tipo de producto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="tipo_producto"
                                    placeholder="nombre" required>
                            </div>
                        </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-warning btn-lg pull-right btn-block">Agregar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

@stop