@php
    $comunas = App\Modelo\Comuna::get();
    $regiones = App\Modelo\Region::get();
@endphp
@extends('layout.layout')

@section('contenido')


<section class="content-header">
    <h1>
        Formulario
        <small>Nuevo Proveedor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('proveedores.index') }}"><i class="fa fa-home"></i> Proveedores</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario de inscripción proveedores</h3>
                    <br>
                    {{-- <small>(Las iniciales del correo será el usuario de proveedor)</small> --}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('proveedores.store') }}"  enctype="multipart/form-data">
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
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre Proveedor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre Proveedor...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Comuna</label>
                            <div class="col-sm-10">
                                <select class="form-control js-example-basic-single" name="id_comuna" required>                                    
                                    @foreach ($comunas as $c)
                                    <option value="{{ $c->id_comuna }}">{{$c->nombre_comuna}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="direccion" placeholder="Ingrese la dirección...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputNombre" name="telefono" placeholder="Ingrese Teléfono...." required>
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <label class="col-md-4 col-form-label" for="hf-rut">Imagen <small>(Opcional)</small></label>
                            <div class="col-md-4">
                                <!-- <img src=""  class='Responsive image img-thumbnail'  width='200px' height='200px' alt=""> -->
                                <input type="file" name="foto" accept="image/*" onchange="preview(this)" />
                                <br>                   
                            </div>
                        </div>  
                        <div class="form-group center-text">
                            <div id="preview"></div>
                        </div>  
                        {{-- comentario --}}
                        {{-- <div class="form-group">
                            <label for="comment" class="col-sm-2 control-label">Comentario</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="comment" name="comentario" rows="5" maxlength="300" placeholder="comentario" required></textarea>
                                <div id="contadorc" class="text-danger"></div>
                            </div>
                        </div> --}}

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('proveedores.index')}}" class="btn btn-danger pull-left">Volver</a>
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