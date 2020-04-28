@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Unidades</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Tipos de Unidades</li>
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
				{{-- @if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif --}}
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
          <h3 class="box-title">Todos las unidades</h3>          
        </div>
        <div class="col-md-12 text-center">          
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-dangerCategoria"><i class="fa fa-check-square"></i>&nbsp;Nueva Unidad</button>
          <form action="{{route('unidades.store')}}" method="post">
						{!! csrf_field() !!}	
            <div class="modal modal-success fade" id="modal-dangerCategoria" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Crear Unidad</h4>
                  </div>
                  <div class="modal-body">
                    <!-- <p>One fine body…</p> -->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="form-group md-form md-5">
                          <label for="inputc1" class="col-md-4 control-label">Nombre Unidad</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="inputc1" name="nombre" value="" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
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
                <th>Nombre Unidad</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($unidades)>0 )
                @foreach ($unidades as $u)
                <tr>
                  <td>{{ $u->id_unidad }}</td>
                  <td>{{ $u->nombre_unidad }}</td>
                  <td>
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-U{{ $u->id_unidad }}"><i class="fa fa-edit"></i>&nbsp;Editar</button>
                     
                        <div class="modal modal-success fade" id="modal-U{{ $u->id_unidad  }}" style="display: none;">
                          <div class="modal-dialog">
                              <form action="{{route('unidades.update', $u->id_unidad  )}}" method="post">
                                {!! csrf_field() !!}	
                                {!! method_field('PUT') !!}
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Actualizar Unidad</h4>
                                  </div>
                                  <div class="modal-body">
                                    <!-- <p>One fine body…</p> -->
                                    <div class="container-fluid">
                                      <div class="row">
                                        <div class="form-group md-form md-5">
                                          <label for="inputc1" class="col-md-4 control-label">Nombre Unidad</label>
                                          <div class="col-md-6">
                                            <input type="text" class="form-control" id="inputc1" name="nombre" value="{{ $u->nombre_unidad  }}" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
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