@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Tipos de Canastas</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Tipos de Canastas</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      	@if (session('info'))
				<div class="alert alert-danger">
					{{ session('info') }}
				</div>
				@endif
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
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los tipos de canastas</h3>          
        </div>
        <div class="col-md-12 text-center">          
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-dangerCategoria"><i class="fa fa-check-square"></i>&nbsp;Nuevo Tipo Canasta</button>
          <form action="{{route('tipocanastas.store')}}" method="post">
						{!! csrf_field() !!}	
            <div class="modal modal-success fade" id="modal-dangerCategoria" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Crear Tipo Canasta</h4>
                  </div>
                  <div class="modal-body">
                    <!-- <p>One fine body…</p> -->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="form-group md-form md-5">
                          <label for="inputc1" class="col-md-4 control-label">Nombre Tipo Canasta</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="nombre" value="" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                          </div>               
                        </div>  
                                       
                      </div>
                    </div>                       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline">Agregar</button>
                  </div>
                </div>
              </div>
            </div>                
          </form>   
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table  class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($tipos)>0 )
                @foreach ($tipos as $t)
                <tr>
                  <td>{{ $t->id_tipo_canasta }}</td>
                  <td>{{ $t->nombre }}</td>
                  <td>
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-U{{ $t->id_tipo_canasta }}"><i class="fa fa-edit"></i>&nbsp;Editar</button>
                     
                        <div class="modal modal-success fade" id="modal-U{{ $t->id_tipo_canasta }}" style="display: none;">
                          <div class="modal-dialog">
                              <form action="{{route('tipocanastas.update',  $t->id_tipo_canasta )}}" method="post">
                                {!! csrf_field() !!}	
                                {!! method_field('PUT') !!}
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Actualizar Tipo Canastas</h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- <p>One fine body…</p> -->
                                    <div class="container-fluid">
                                      <div class="row">
                                        <div class="form-group md-form md-5">
                                          <label for="inputc1" class="col-md-4 control-label">Nombre</label>
                                          <div class="col-md-6">
                                            <input type="text" class="form-control" id="inputc1" name="nombre" value="{{ $t->nombre }}" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                                          </div>   
                                        </div>                    
                                      </div>
                                    </div>                       
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-outline">Guardar Cambios</button>
                                  </div>
                                </div>
                                           
                             </form>  
                            </div>   
                        </div>
                       
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@stop