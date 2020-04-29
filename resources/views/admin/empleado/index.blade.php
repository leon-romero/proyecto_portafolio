@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Empleados</h1>
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
          <h3 class="box-title">Todos los Empleados</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('empleado.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Empleado</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>RUN</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th></th>
                {{-- <th></th> --}}
              </tr>
            </thead>
            <tbody>
              @if (count($empleados)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($empleados as $e)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $e->run }}</td>
                  <td>{{ $e->nombre_completo() }}</td>
                  <td>{{ $e->correo }}</td>
                  <td>
                    {{-- <a href="" class="btn btn-primary btn-sm">Direcciones <i class="fa fa-home"></i></a> --}}
                    <a href="{{ route('empleado.edit',$e->run) }}" class="btn btn-info btn-sm">Editar <i class="fa fa-edit"></i></a>
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