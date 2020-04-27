@php
    $cultivos = App\Modelo\Cultivo::get();
    $tiposProducto = App\Modelo\TipoProducto::get();
@endphp

@extends('proveedor.layout.layout')

@section('contenido')



<section class="content-header">
    <h1>
        Agregar Nuevo
        <small>Producto</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('prov.productos') }}"><i class="glyphicon glyphicon-barcode text-green"></i> Productos</a></li>
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
                    <h3 class="box-title">Formulario de registro</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('prov.productos.store') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group  {{ $errors->has('') ? 'has-error' : '' }}">
                            <label for="inputTipoProd" class="col-sm-2 control-label">Producto</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="select_tipo" name="id_tipo_producto"  onChange="buscarTiposProductos()"  required>
                                    @foreach ($tiposProducto as $tp)
                                    @if ($tp->id_tipo_producto== old('id_tipo_producto'))
                                    <option selected value="{{ $tp->id_tipo_producto }}">{{$tp->nombre_tipo}}</option>
                                    @else
                                    <option value="{{ $tp->id_tipo_producto }}">{{$tp->nombre_tipo}}</option>
                                    @endif
                                   
                                    @endforeach
                                </select>
                                {!! $errors->first('id_tipo_producto', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="inputTipoProd" class="col-sm-2 control-label"> Precio:</label>
                            <div class="col-sm-10">
                                <div id="precio_producto"></div>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="inputTipoProd" class="col-sm-2 control-label"> Unidad:</label>
                            <div class="col-sm-10">
                                <div id="unidad_producto"></div>
                            </div>
                        </div>

                        <div class="form-group  {{ $errors->has('nombre_producto') ? 'has-error' : '' }}">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" autocomplete="off" id="inputNombre" name="nombre_producto" value="{{ old('nombre_producto') }}" placeholder="Nombre Producto" required>
                                {!! $errors->first('nombre_producto', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('id_cultivo') ? 'has-error' : '' }}">
                            <label for="inputCultivo" class="col-sm-2 control-label">Cultivo</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_cultivo"  required>
                                    @foreach ($cultivos as $c)
                                    @if ($c->id_cultivo==old('id_cultivo'))
                                    <option selected value="{{ $c->id_cultivo }}">{{$c->nombre_cultivo}}</option>
                                    @else
                                    <option value="{{ $c->id_cultivo }}">{{$c->nombre_cultivo}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('id_cultivo', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cantidad_stock') ? 'has-error' : '' }}">
                            <label for="inputPrecio"  class="col-sm-2 control-label">Cantidad Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control"  id="inputStock" name="cantidad_stock" value="{{ old('cantidad_stock') }}" placeholder="Cantidad Stock" required>
                                {!! $errors->first('cantidad_stock', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group  {{ $errors->has('precio_compra') ? 'has-error' : '' }}">
                            <label for="inputPrecio" class="col-sm-2 control-label">Precio</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputPrecio" name="precio_compra" value="{{ old('precio_compra') }}" placeholder="Precio Compra" required>
                                {!! $errors->first('precio_compra', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group  {{ $errors->has('lugar_cultivo') ? 'has-error' : '' }}">
                            <label for="inputLugar" class="col-sm-2 control-label">Lugar Cultivo</label>
                            <div class="col-sm-10">
                                <input type="text" autocomplete="off" class="form-control" id="inputLugar" name="lugar_cultivo" value="{{ old('lugar_cultivo') }}" placeholder="Lugar Cultivo" required>
                                {!! $errors->first('lugar_cultivo', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group  {{ $errors->has('comentario_prod') ? 'has-error' : '' }}">
                            <label for="comment" class="col-sm-2 control-label">Comentario</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" autocomplete="off" id="commentprod" name="comentario_prod" rows="5" maxlength="300" placeholder="comentario">{{ old('comentario_prod') }}</textarea>
                                 {!! $errors->first('comentario_prod', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('prov.productos') }}" class="btn btn-danger">volver</a>
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

    <script src="/bower_components/axios/js/axios.min.js"></script>
    <script>
        buscarTiposProductos();
        function buscarTiposProductos(){
        
        var id_tipo = document.getElementById('select_tipo').value;
        var url = '../../api/tiposproductos/' + id_tipo; 
        axios.get(url, {
        responseType: 'json'
        })
            .then(function(res) {
            if(res.status==200) {
                // console.log(res.data);
                // document.getElementById('nombre_producto').innerHTML = res.data.nombre_tipo;
                // document.getElementById('precio_producto').innerHTML = res.data.precio;
                document.getElementById('unidad_producto').innerHTML = res.data.unidad;
            }
            // console.log(res);
            })
            .catch(function(err) {
            console.log(err);
            // mensaje.innerText = 'Error de conexión ' + err;
            });
        }

    </script>
@stop