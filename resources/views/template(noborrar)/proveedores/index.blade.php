@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Proveedores</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Proveedores</li>
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
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif     
    </div>
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los Proveedores</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('proveedores.create') }}" class="btn btn-success btn-sm"><i class="fa fa-cubes"></i> Nuevo Proveedor</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($proveedores)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($proveedores as $p)
                <tr>
                  <td>{{ $i }}</td>
                  @php
                      $i +=1;
                  @endphp
                  <td>{{ $p->nombre }}</td>
                  <td>{{ $p->correo }}</td>
                  <td>{{ $p->telefono }}</td>
                  <td>
                  <a href="{{route('proveedores.productos', $p->id_proveedor)}}" class="btn btn-primary btn-sm"> Productos <i class="glyphicon glyphicon-barcode"></i> </a>
                  </td>
                  <td>
                    <form action="" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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