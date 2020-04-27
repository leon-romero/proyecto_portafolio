@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Administradores</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Administradores</li>
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
      @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Mensaje</h4>
           Nuevo Cliente.
        </div>
      @endif
    </div>
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos los Administradores</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('administradores.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Administrador</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Usuario</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($administradores)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($administradores as $a)
                <tr>
                  <td>{{ $i }}</td>
                  @php
                      $i +=1;
                  @endphp
                  <td>{{ $a->username }}</td>
                  <td>{{ $a->nombres . " " , $a->apellidos }}</td>
                  <td>{{ $a->correo }}</td>
                  <td>
                    {{-- <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a> --}}
                    <form action="" method="post">
                      @csrf
                      @method('DELETE')
                      {{-- <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button> --}}
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