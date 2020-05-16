@extends('layout.layout')

@section('contenido')
<section class="content-header">
<h1>Lista de Productos del proveedor {{ $pro->nombre_proveedor }}</h1>
</section>
<section class="content">
  <div class="row">

    {{-- Alerta de mensaje --}}
    @include('layout.alerta')
    {{-- Alerta de mensaje --}}
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
          <form class="form-horizontal" method="post" action="{{ route('proveedor.producto.store') }}">
              @csrf
              <input type="hidden" name="id_ficha_proveedor" value="{{ $pro->id_ficha_proveedor }}">
              <div class="box-body">
                <div class="row form-group">
                  <label class="col-sm-2 control-label">Producto</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="id_producto" name="id_producto">
                      @foreach ($productos as $p)
                      @if ($p->activo==0)
                        <option disabled value="{{ $p->id_producto }}">{{ $p->nombre_producto }}</option>   
                      @else
                        <option value="{{ $p->id_producto }}">{{ $p->nombre_producto }}</option>   
                      @endif
                      @endforeach                     
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <a href="{{ route('proveedor.index') }}" class="btn btn-danger">Volver</a>
                  <button type="submit" class="btn btn-success pull-right">Agregar</button>
              </div>
          </form>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los Productos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre Producto</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($detalles)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($detalles as $d)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $d->producto->nombre_producto }}</td>
                  {{-- <td>{{ $pro->rubro }}</td> --}}
                  {{-- <td>{{ $pro->telefono }}</td> --}}
                  {{-- <td>{{ $pro->correo }}</td> --}}
                  <td>                    
											<form action="{{ route('proveedor.producto.destroy',$d->id_detalle_proveedor ) }}" method="post">
												{!! csrf_field() !!}
												{!! method_field('DELETE') !!}
												<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
											</form>
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