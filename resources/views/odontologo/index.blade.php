@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Servicios</h1>
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
          <h3 class="box-title">Todos los Servicios</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('servicio.create')}}" class="btn btn-success btn-sm">
            {{-- <i class="fa fa-user-plus"></i> --}}
            Nuevo Servicio</a>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>Hora</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($reservas)>0 ) 
              @foreach ($reservas as $r)
                <tr>
                  <td>
                    @if ($r->id_odontologo==0)
                      Espera
                    @else
                      Atendido
                    @endif
                  </td>
                  <td>{{ $r->horario->horario }}</td>
                  <td>{{ $r->cliente->run }}</td>
                  <td>{{ $r->cliente->nombre_completo() }}</td>
                  {{-- <td>{{ $r->cliente->run }}</td> --}}
                  <td>
                    {{-- <a href="{{ route('servicio.edit',$s->id_servicio) }}" class="btn btn-info btn-sm">editar <i class="fa fa-edit"></i></a> --}}
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