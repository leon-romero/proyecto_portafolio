@php
    $tipos = App\Modelo\TipoCanasta::get();

    $activos = Array([ 'id' => 1, 'nombre' => 'Edición' ] , [ 'id' => 2, 'nombre' => 'Disponible'] ,[ 'id' => 3, 'nombre' => 'No Disponible' ]   );
    // dd($activos);
@endphp
@extends('layout.layout')

@section('contenido')


<section class="content-header">
    <h1>
        Formulario
        <small>Edición Canasta</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('canastas.index') }}"><i class="fa fa-home"></i> Cliente</a></li>
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
                    <h3 class="box-title">Formulario edición de canasta</h3>
                    <br>
                    <small>(La Canasta será visible mientras el estado sea <strong>Disponible</strong>)</small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('canastas.update',$canasta->id_canasta) }}">
                    {!! csrf_field() !!}                    
                    {!! method_field('PUT') !!}
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Fecha Creación</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" value="{{ date('d-m-Y', strtotime($canasta->created_at))  }}" disabled>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Tipo Canasta</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_tipo_canasta" required>                                    
                                    @foreach ($tipos as $t)
                                        @if ($t->id_tipo_canasta == $canasta->id_tipo_canasta)
                                        <option selected value="{{ $t->id_tipo_canasta }}">{{$t->nombre}}</option>
                                        @else
                                        <option value="{{ $t->id_tipo_canasta }}">{{$t->nombre}}</option>
                                        @endif                                  
                                    @endforeach
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" value="{{ $canasta->nombre_canasta }}" name="nombre_canasta" placeholder="Ingrese Nombre de canasta..." required>
                            </div>
                        </div>            
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Descripción Corta</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="descripcion" placeholder="..." required>{{ $canasta->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">                            
                            <label for="inputNombre" class="col-sm-2 control-label">Descripción Larga</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="descripcion_larga" placeholder="..." required>{{ $canasta->descripcion_larga }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Precio $</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="{{ $canasta->precio_canasta }}" id="inputNombre" name="precio_canasta" placeholder="0" min="1" pattern="^[0-9]+" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="activo" required>                                    
                                    @foreach ($activos as $ac)
                                        @if ($ac['id'] == $canasta->activo )
                                        <option selected value="{{ $ac['id'] }}">{{$ac['nombre']}}</option>
                                        @else
                                        <option value="{{ $ac['id'] }}">{{$ac['nombre']}}</option>
                                        @endif                                       
                                    @endforeach
                                </select>
                            </div>
                        </div>     
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('canastas.index')}}" class="btn btn-danger pull-left">Volver</a>
                        <button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>
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