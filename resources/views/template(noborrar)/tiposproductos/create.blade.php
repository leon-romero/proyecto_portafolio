@php
    $tipos = App\Modelo\TipoCanasta::get();
    $unidades = App\Modelo\Unidad::get();
@endphp
@extends('layout.layout')

@section('contenido')


<section class="content-header">
    <h1>
        Formulario
        <small>Nuevo Tipo Producto</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('tipoproductos.index') }}"><i class="fa fa-home"></i> Tipos de Productos</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            @if (session('info'))
                <div class="alert alert-info">
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
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario de Tipos Productos</h3>
                    <br>
                    {{-- <small>(La Canasta será visible mientras este en catálogo)</small> --}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('tipoproductos.store') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('nombre_tipo') ? 'has-error' : '' }}">
                            <label for="inputNombre" class="col-sm-2 control-label"> Nombre</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombre_tipo" value="{{ old('nombre_tipo') }}" placeholder="Ingrese Nombre Tipo..." required>
                                {!! $errors->first('nombre_tipo', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>    
                        <div class="form-group {{ $errors->has('comentario') ? 'has-error' : '' }}">
                            <label for="inputNombre" class="col-sm-2 control-label">Descripcion</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="comentario" value="{{ old('comentario') }}" placeholder="Ingrese descripción...." required>
                                {!! $errors->first('comentario', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>                          
                        <div class="form-group {{ $errors->has('precio_producto') ? 'has-error' : '' }}">
                            <label for="inputNombre" class="col-sm-2 control-label">Precio $</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputNombre" name="precio_producto" value="{{ old('precio_producto') }}" placeholder="0" min="1" pattern="^[0-9]+" required>
                                
                                {!! $errors->first('precio_producto', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('id_unidad') ? 'has-error' : '' }}">
                            <label for="inputName" class="col-sm-2 control-label">Tipo Unidad</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_unidad" required>                                    
                                    @foreach ($unidades as $u)
                                    <option value="{{ $u->id_unidad }}">{{$u->nombre_unidad}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('id_unidad', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div> 
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('tipoproductos.index')}}" class="btn btn-danger pull-left">Volver</a>
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
   <script>
  
        function preview(e)
          {
            if(e.files && e.files[0])
            {
              if (e.files[0].type.match('image.*')) {
                var reader=new FileReader();
            
                // El evento onload se ejecuta cada vez que se ha leido el archivo
                // correctamente
                reader.onload=function(e) {   
                  document.getElementById("preview").innerHTML="<img src='"+e.target.result+"' class='Responsive image img-thumbnail' width='200px' height='200px' >";
                }
            
                // El evento onerror se ejecuta si ha encontrado un error de lectura
                reader.onerror=function(e) {
                  document.getElementById("preview").innerHTML="Error de lectura";
                }
            
                // indicamos que lea la imagen seleccionado por el usuario de su disco duro
                reader.readAsDataURL(e.files[0]);
              }else{
            
                // El formato del archivo no es una imagen
                document.getElementById("preview").innerHTML="No es un formato de imagen";
              }
            }
          }
        </script>
@stop