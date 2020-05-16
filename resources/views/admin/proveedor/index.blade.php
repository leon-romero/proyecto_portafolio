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
        <div class="col-md-12 text-center">
          <a href="{{ route('proveedor.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Proveedor</a>
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
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $pro->nombre_empresa }}</td>
                  <td>{{ $pro->rubro }}</td>
                  <td>{{ $pro->telefono }}</td>
                  <td>{{ $pro->correo }}</td>
                  <td>
                    <a href="{{ route('proveedor.show',$pro->id_ficha_proveedor) }}" class="btn btn-success btn-sm">Productos <i class="fa fa-boxes"></i></a>
                  </td>
                  <td>
                    {{-- <a href="" class="btn btn-primary btn-sm">Direcciones <i class="fa fa-home"></i></a> --}}
                    <a href="{{ route('proveedor.edit',$pro->id_ficha_proveedor) }}" class="btn btn-info btn-sm">Editar <i class="fa fa-edit"></i></a>
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