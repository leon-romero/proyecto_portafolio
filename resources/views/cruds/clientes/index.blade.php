@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Clientes</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Clientes</li>
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
          <h3 class="box-title">Todos los Clientes</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('clientes.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Cliente</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th></th>
                {{-- <th></th> --}}
              </tr>
            </thead>
            <tbody>
              @if (count($clientes)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($clientes as $c)
                <tr>
                  <td>{{ $i }}</td>
                  @php
                      $i +=1;
                  @endphp
                  <td>{{ $c->nombre . " " . $c->apellidos }}</td>
                  <td>{{ $c->correo }}</td>
                  <td>{{ $c->telefono }}</td>
                  <td>
                    <a href="{{ route('clientes.pedidos',$c->id_cliente) }}" class="btn btn-success btn-sm">Pedidos <i class="fa fa-shopping-cart"></i></a>
                    <a href="{{ route('clientes.direcciones',$c->id_cliente) }}" class="btn btn-primary btn-sm">Direcciones <i class="fa fa-home"></i></a>
                    <a href="{{ route('clientes.edit',$c->id_cliente) }}" class="btn btn-danger btn-sm">Editar <i class="fa fa-edit"></i></a>
                  </td>
                  {{-- <td> --}}
                    {{-- <form action="" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ route('clientes.direcciones',$c->id_cliente) }}" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>
               --}}
                  {{-- </td> --}}
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