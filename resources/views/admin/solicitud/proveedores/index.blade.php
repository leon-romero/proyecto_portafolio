@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Proveedores</h1>
  {{-- <ol class="breadcrumb"> --}}
    {{-- <li><a href=""><i class="fa fa-home"></i> Home</a></li> --}}
    {{-- <li class="active">Clientes</li> --}}
  {{-- </ol> --}}
</section>
<section class="content">
  <div class="row">

    {{-- Alerta de mensaje --}}
    @include('layout.alerta')
    {{-- Alerta de mensaje --}}

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los Proveedores</h3>
        </div>
        
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
        

          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre Empresa</th>
                <th>Rubro</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($proveedores)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($proveedores as $pro)
                @php
                    $detalle = App\Modelo\DetalleProveedor::where('id_ficha_proveedor',$pro->id_ficha_proveedor)->get();
                @endphp
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $pro->nombre_empresa }}</td>
                  <td>{{ $pro->rubro }}</td>
                  <td>{{ $pro->telefono }}</td>
                  <td>{{ $pro->correo }}</td>
                  <td>
                      {{-- modal --}}
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $pro->id_ficha_proveedor }}">
                      Ver productos
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $pro->id_ficha_proveedor }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Productos de {{ $pro->nombre_empresa }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            @foreach ($detalle as $d)
                                <ul>{{ $d->producto->nombre_producto }}</ul>
                            @endforeach
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>
                  <td>
                    {{-- <a href="" class="btn btn-primary btn-sm">Direcciones <i class="fa fa-home"></i></a> --}}
                    <a href="{{ route('monitoreo.create',$pro->id_ficha_proveedor) }}" class="btn btn-success btn-sm">Crear solicitud</a>
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