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
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los tipos de canastas</h3>          
        </div>
        <div class="col-md-12 text-center">  
          <a href="{{ route('canastas.create')}}" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i>&nbsp;Nueva Canasta</a>        
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-bordered " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>Fecha Creación</th>
                <th>Tipo Canasta</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($canastas)>0 )
                @foreach ($canastas as $c)
                @php
                    if($c->activo==0){
                      continue;
                    }
                @endphp
                <tr>
                  <td class="text-center">
                   

                    @switch($c->activo)
                      @case(1)
                        <p class="label-primary">Edición</p>
                        @break
                      @case(2)
                        <p class="label-success">Disponible</p>
                        @break
                      @case(3)
                        <p class="label-danger">No Disponible</p>
                        @break                            
                    @endswitch

                  </td>
                  <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
                  <td>{{ $c->tipoCanasta->nombre }}</td>
                  <td>{{ $c->nombre_canasta }}</td>
                  @php
 
                  @endphp
                  <td>{{  $c->dinero_texto() }}</td>
                  <td>
                      <a href="{{ route('canasta.detalle',$c->id_canasta) }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-barcode"></i>&nbsp;Productos</a>
                      <a href="{{ route('canastas.show',$c->id_canasta) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      {{-- <a href="{{ route('canasta.gestion',$c->id_canasta) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> --}}
                      {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-U{{ $t->id_tipo_canasta }}"><i class="fa fa-edit"></i>&nbsp;Editar</button>
                     
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
                        </div> --}}
                       
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