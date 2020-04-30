@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    <h1>Editar paciente</h1>
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')
    
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Formulario para editar Paciente {{ $p->nombre_completo() }}</h3>
                    <br>
                    <small>(El RUN será el usuario del paciente)</small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('paciente.update',$p->run) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">  
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Run </label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="run" value="{{ $p->run }}" placeholder="Ingrese Run de Paciente...." required>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="nombres" value="{{ $p->nombres }}" placeholder="Nombre Paciente...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNombre" name="apellidos" value="{{ $p->apellidos }}" placeholder="Apellidos Paciente...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Telefono</label>
                                <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputNombre" name="telefono" value="{{ $p->telefono }}" placeholder="Ingrese Telefono...." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNombre" class="col-sm-2 control-label">Correo</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputNombre" name="correo" value="{{ $p->correo }}" placeholder="Ingrese Correo...." required>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Región</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_region" name="region" onChange="CargarComunas()">   
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Comuna</label>
                            <div class="col-sm-10">
                                
                                <select class="form-control {{ $errors->has('id_comuna') ? 'is-invalid' : '' }}" name='id_comuna' id="select_comuna">
                                </select>
                                {!! $errors->first('id_comuna', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2 control-label">direccion</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="direccion" placeholder="..." required> {{ $p->direccion }} </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('paciente.index')}}" class="btn btn-danger pull-left">Volver</a>
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
     var comunas = [
        @foreach ($comunas as $c)
          {'nombre':'{{ $c->nombre_comuna }}','id':'{{ $c->id_comuna }}','id_region':'{{ $c->id_region}}'},
        @endforeach
      ];
      var regiones = [
        @foreach ($regiones as $r)
          {'nombre':'{{ $r->nombre_region }}','id_region':'{{ $r->id_region }}'},
        @endforeach
      ];
        var com = "{{ $p->id_comuna }}"
        CargarRegiones('select_region')
        CargarComunas();

        
        function CargarRegiones(selectId){
            var select = $('#'+selectId);
            select.find('option').remove();
            //alert(options);
            var r = "{{ $p->comuna->id_region }}"
            $.each(regiones, function(key,value) {
                if(r==value.id_region){
                    select.append('<option selected value=' + value.id_region + '>' + value.nombre + '</option>');
                }else{
                    select.append('<option value=' + value.id_region + '>' + value.nombre + '</option>');
                }         
            });
        }
      
        function CargarComunas(){
            var select = $('#select_comuna');
            select.find('option').remove();
            //alert(options);
            var id_r = document.getElementById("select_region").value;
            var coms = comunas.filter( c => c.id_region==id_r);
         
            $.each(coms, function(key,value) {  
                if(com==value.id){
                    select.append('<option selected value=' + value.id + '>' + value.nombre + '</option>');
                    com = 0;
                }else{
                    select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
                }          
            });
        }
    </script>
@stop
