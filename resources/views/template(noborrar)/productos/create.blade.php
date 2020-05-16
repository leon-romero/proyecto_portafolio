@php
    $proveedores = App\Modelo\Proveedor::get();
    $cultivos = App\Modelo\Cultivo::get();
    $tiposProducto = App\Modelo\TipoProducto::get();
@endphp

@extends('layout.layout')

@section('contenido')



<section class="content-header">
    <h1>
        Agregar Nuevo
        <small>Producto</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/productos"><i class="fa fa-home"></i> Home</a></li>
    </ol>
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Mensaje</h4>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Error</h4>
                    {{ session('danger') }}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('productos.store') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputTipoProd" class="col-sm-2 control-label">Tipo Producto</label>
                            <div class="col-sm-10">
                                <select class="form-control " name="id_tipo_producto">
                                    @foreach ($tiposProducto as $tp)
                                    <option value="{{ $tp->id_tipo_producto }}">{{$tp->nombre_tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombre_producto" placeholder="Nombre Producto" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProveedor" class="col-sm-2 control-label">Proveedor</label>
                            <div class="col-sm-10">
                                <select class="form-control " name="id_proveedor">
                                    @foreach ($proveedores as $p)
                                    <option value="{{ $p->id_proveedor }}">{{ $p->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCultivo" class="col-sm-2 control-label">Cultivo</label>
                            <div class="col-sm-10">
                                <select class="form-control " name="id_cultivo">
                                    @foreach ($cultivos as $c)
                                    <option value="{{ $c->id_cultivo }}">{{$c->nombre_cultivo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPrecio" class="col-sm-2 control-label">Cantidad Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputStock" name="cantidad_stock" placeholder="Cantidad Stock" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPrecio" class="col-sm-2 control-label">Precio Compra</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPrecio" name="precio_compra" placeholder="Precio Compra" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputLugar" class="col-sm-2 control-label">Lugar Cultivo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputLugar" name="lugar_cultivo" placeholder="Lugar Cultivo" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">Comentario Producto</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="commentprod" name="comentario_prod" rows="5" maxlength="300" placeholder="comentario"></textarea>
                                <div id="contadorcpd" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">Comentario Privado</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="commentpriv" name="comentario_privado" rows="5" maxlength="300" placeholder="comentario"></textarea>
                                <div id="contadorcpv" class="text-danger"></div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-warning btn-lg pull-right btn-block">Guardar</button>
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
