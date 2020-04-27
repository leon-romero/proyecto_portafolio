@php
    $tipos = App\Modelo\TipoCanasta::get();

@endphp
@extends('layout.layout')

@section('contenido')


<section class="content-header">
    <h1>
        Formulario
        <small>Nueva Canasta</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('canastas.index') }}"><i class="fa fa-home"></i> Cliente</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario nueva canasta</h3>
                    <br>
                    <small>(La Canasta será visible mientras este en catálogo)</small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('canastas.store') }}">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Tipo Canasta</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_tipo_canasta" required>                                    
                                    @foreach ($tipos as $t)
                                    <option value="{{ $t->id_tipo_canasta }}">{{$t->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombre_canasta" placeholder="Ingrese Nombre de canasta..." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Descripción Corta</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="descripcion" placeholder="..." required></textarea>
                            </div>
                        </div>
                        <div class="form-group">                            
                            <label for="inputNombre" class="col-sm-2 control-label">Descripción Larga</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="descripcion_larga" placeholder="..." required></textarea>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Precio $</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputNombre" name="precio_canasta" placeholder="0" min="1" pattern="^[0-9]+" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('canastas.index')}}" class="btn btn-danger pull-left">Volver</a>
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