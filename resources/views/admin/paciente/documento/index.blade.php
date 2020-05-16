@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Docuemento del Paciente</h1>
  {{-- <ol class="breadcrumb"> --}}
    {{-- <li><a href=""><i class="fa fa-home"></i> Home</a></li> --}}
    {{-- <li class="active">Clientes</li> --}}
  {{-- </ol> --}}
</section>
<section class="content">
  <div class="row">
    
    @include('layout.alerta')

    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><a href="{{ route('paciente.index')}}" class="btn btn-danger btn-sm pull-left">Volver</a>   Todos los documentos</h3>
        </div>
        {{-- <div class="col-md-12 text-center">
          
        </div> --}}
        <br>
        <br>
        <div class="box-body table-responsive">
          <table class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nombre Documento</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($documentos_paciente as $dp)    
                <tr>       
                  <td>{{ $dp->documento->nombre_documento }}</td>
                  <td>
                    <a href="{{ Storage::url($dp->ruta) }}" target="_blink" class="btn btn-info">Ver documento</a>
                  </td>
                  <td>
                    <a href="{{ route('paciente.documento.delete',$dp->id_detalle_documento) }}" class="btn btn-danger"></i>Eliminar</a>	
                  </td>
                  
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <!-- Horizontal Form -->
      <div class="box box-danger">
          <div class="box-header with-border">
              <h3 class="box-title">inscripción Documento</h3>
              <br>
              {{-- <small>(El RUN será el usuario del paciente)</small> --}}
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="{{ route('paciente.documento.store',$p->run) }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">              
                <div class="row form-group">
                  <label class="col-sm-2 control-label">Documento</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="id_documento" name="id_documento">
                      
                      @foreach ($documentos as $d)
                        <option value="{{ $d->id_documento }}">{{ $d->nombre_documento }}</option>   
                      @endforeach                     
                    </select>
                  </div>
                </div>
                <div class="form-group">

									<input type="file" name="archivo" class="form-control-file" accept="application/pdf" required >
									
								</div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right">Agregar</button>
              </div>
          </form>
      </div>

    </div>
  </div>
</section>
@stop