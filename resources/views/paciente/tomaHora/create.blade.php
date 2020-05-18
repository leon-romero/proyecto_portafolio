@extends('layout.layout')
@section('style')

@stop

@section('contenido')

  <section class="content-header">
    <h1>Bienvenido</h1>
  </section>
  <section class="content">
    <div class="row">
        @include('layout.alerta')

        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Agenda tu hora.</h3>
                    <br>
                    <small></small>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{ route('tomadehora.store') }}">
                    @csrf
                    <div class="box-body">                
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Servicio</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="select_servicio" name="servicio" required>
                                    @foreach ($servicios as $s)
                                        <option value="{{ $s->id_servicio }}">{{ $s->nombre_servicio }}</option> 
                                     @endforeach   
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Fecha Agenda</label>
                            <div class="col-sm-6">
                                <input type="date" id="fecha_agenda" name="fecha_agenda" onChange="CargarHorario()" value="{{date('Y-m-d')}}" required>   
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Hora Disponible</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="id_horario" name="id_horario" required>   
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('paciente.index') }}" class="btn btn-danger pull-left">Volver</a>
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
      function validarRut(string) {//solo letras y numeros
            var out = '';
            //Se añaden las letras validas
            var filtro = '1234567890Kk';//Caracteres validos

            for (var i = 0; i < string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1)
                out += string.charAt(i).toUpperCase();
            return out;
        }
    </script>
    <script>
		CargarHorario();
        function CargarHorario() {
            var fecha = document.getElementById('fecha_agenda').value;
			console.log(fecha);
			
            url = '/api/horadisponible/' + fecha;
            fetch(url)
                .then(resp=>{
                    return resp.json();
                }).then(result =>{
                    console.log(result);
                    console.log(url);
					var $select = $('#id_horario');
                    $select.find('option').remove();
                    // alert(options);
                    $.each(result, function(key,value) {
						if(value.activo==1){
							$select.append('<option value=' + value.id_horario + '>' + value.horario + '</option>');
						}else{
							$select.append('<option disabled="disabled" value=' + value.id_horario + '>' + value.horario + ' (reservado) </option>');
						}                     
                   });                    
            });
        }   
	</script>	
@stop
