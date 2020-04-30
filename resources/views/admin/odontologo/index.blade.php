@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Odontologos</h1>
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
          <h3 class="box-title">Todos los Odontologos</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('odontologo.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo odontologo</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>RUN</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($odontologos)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($odontologos as $o)
                <tr>
                  {{-- <td>
                    @if ($0->activo==1)
                        activado
                    @else
                        desactivado
                    @endif
                  </td> --}}
                  <td>{{ $i++ }}</td>
                  <td>{{ $o->run }}</td>
                  <td>{{ $o->nombre_completo() }}</td>
                  <td>{{ $o->correo }}</td>
                  <td>{{ $o->telefono }}</td>
                  <td>
                   
                    <a href="{{ route('odontologo.edit',$o->run) }}" class="btn btn-info btn-sm">Editar <i class="fa fa-edit"></i></a>

                  {{-- </td>
                    <td>
                    @if ($e->activo==1)
                    <form action="{{ route('odontologo.destroy',$e->id_empleado) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i>Eliminar</button>
                    </form>
                    @else
                    <form action="{{ route('odontologo.destroy',$e->id_empleado) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class='btn btn-success btn-sm'><i class="fa fa-check"></i>Reactivar</button>
                    </form>
                    @endif
                  </td> --}}
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