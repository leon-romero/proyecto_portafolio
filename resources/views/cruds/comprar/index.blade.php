@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1> <span class="label-success label">Paso 1</span></h1>  
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Comprar Canasta</li>
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
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Canastas disponibles</h3>          
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="datatable table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
                    $detalleCanasta = App\Modelo\DetalleCanasta::where('id_canasta',$c->id_canasta)->get();

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
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-C{{ $c->id_canasta }}"><i class="fa fa-eye"></i></button>
                      <a href="{{ route('compras.show',$c->id_canasta) }}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i>&nbsp;Comprar</a>
                      {{-- ver --}}                    
                      <div class="modal modal-warning fade" id="modal-C{{ $c->id_canasta  }}" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">{{ $c->nombre_canasta }}</h4>
                            </div>
                            <div class="modal-body">
                              <!-- <p>One fine body…</p> -->
                              <div class="container-fluid">
                                <div class="row">
                                    <table class="table text-negro" border="1">
                                        <tbody>
                                            @foreach ($detalleCanasta as $d)
                                              <tr>
                                                  <td><i class="fa fa-shopping-basket"></i> {{ $d->cantidadS() . "  ". $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }}</small></td>
                                              </tr>    
                                            @endforeach
                                                                                     
                                        </tbody>
                                    </table>                                                
                                </div>                                
                              </div>                       
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                            
                            </div>
                          </div>
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