@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Categorías</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Tipos de Categorías</li>
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
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos las Categorias</h3>          
        </div>
        <div class="col-md-12 text-center">          
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-dangerCategoria"><i class="fa fa-check-square"></i>&nbsp;Nueva Unidad</button>
          <form action="{{route('categorias.store')}}" method="post">
						{!! csrf_field() !!}	
            <div class="modal modal-success fade" id="modal-dangerCategoria" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Crear Categoria</h4>
                  </div>
                  <div class="modal-body">
                    <!-- <p>One fine body…</p> -->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="form-group md-form md-5">
                          <label for="inputc1" class="col-md-4 control-label">Nombre Categoría</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="descripcion" value="" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                          </div>               
                        </div>  
                        <br>
                        <br>
                        <div class="form-group md-form md-5">
                            <label for="inputc1" class="col-md-4 control-label">Comentario</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="comentario" rows="5" placeholder="..."></textarea>
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
                <th>Comentario</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($categorias)>0 )
                @foreach ($categorias as $c)
                <tr>
                  <td>{{ $c->id_categoria }}</td>
                  <td>{{ $c->descripcion }}</td>
                  <td>{{ $c->comentario }}</td>
                  <td>
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-U{{  $c->id_categoria }}"><i class="fa fa-edit"></i>&nbsp;Editar</button>
                     
                        <div class="modal modal-success fade" id="modal-U{{ $c->id_categoria }}" style="display: none;">
                          <div class="modal-dialog">
                              <form action="{{route('categorias.update',  $c->id_categoria )}}" method="post">
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
                                          <label for="inputc1" class="col-md-4 control-label">Nombre</label>
                                          <div class="col-md-6">
                                            <input type="text" class="form-control" id="inputc1" name="descripcion" value="{{ $c->descripcion }}" placeholder="Nombre min 5 max 60" title="Requiere 5 a 60 caracteres" maxlength="60" pattern=".{5,60}" required>
                                          </div>   
                                        </div>
                                        <br><br>
                                        <div class="form-group md-form md-5">
                                          <label for="inputc1" class="col-md-4 control-label">Comentario</label>
                                          <div class="col-md-6">
                                            <textarea class="form-control" rows="3" name="comentario" placeholder="...">{{ $c->comentario }}</textarea>
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