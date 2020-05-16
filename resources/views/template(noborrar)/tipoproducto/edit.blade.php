@extends('layout.layout')

@section('contenido')


<section class="content-header">
    <h1>
        Perfil
        <small>Administrador</small>
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
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('producto.update' , $p->id_producto) }}">
                {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" 
                            name="nombre" placeholder="nombre" value="{{ $p->nombre }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">id_categoria</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" 
                                    name="id_categoria" placeholder="id_categoria" value="{{ $p->id_categoria }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">unidad</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre"  value="{{ $p->unidad }}"
                                    name="unidad" placeholder="unidad"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">precio</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" value="{{ $p->precio }}"
                                    name="precio" placeholder="precio"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">costo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" value="{{ $p->costo }}"
                                    name="costo" placeholder="costo"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">id_tipo_cultivo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" 
                                    name="id_tipo_cultivo" placeholder="id_tipo_cultivo" value="{{ $p->id_tipo_cultivo }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">lugar_origen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" 
                                    name="lugar_origen" placeholder="lugar_origen" value="{{ $p->lugar_origen }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">id_proveedor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" 
                                    name="id_proveedor" placeholder="id_proveedor" value="{{ $p->id_proveedor }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">id_tipo_producto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" 
                                    name="id_tipo_producto" placeholder="id_tipo_producto"  value="{{ $p->id_tipo_producto }}"
                                    required>
                            </div>
                        </div>

                        {{-- comentario --}}
                        <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">comentario</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="comment"  name="comentario" rows="5"
                                    maxlength="300" placeholder="comentario"
                                    required>{{ $p->comentario }}</textarea>
                                <div id="contadorc" class="text-danger"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="txtdescripcion" class="col-sm-2 control-label">descripcion</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="txtdescripcion"  name="descripcion" rows="5"
                                    maxlength="300" placeholder="descripcion"
                                    required>{{ $p->descripcion }}</textarea>
                                <div id="contadord" class="text-danger"></div>
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