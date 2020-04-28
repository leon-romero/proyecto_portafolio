@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Pacientes</h1>
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
          <h3 class="box-title">Todos los Pacientes</h3>
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('paciente.create')}}" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Nuevo Paciente</a>
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
              @if (count($pacientes)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($pacientes as $p)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $p->run }}</td>
                  <td>{{ $p->nombre_completo() }}</td>
                  <td>{{ $p->correo }}</td>
                  <td>
                    <a href="{{ route('paciente.documento.index',$p->run) }}" class="btn btn-danger btn-sm">Documento 
                      {{-- <i class="fa fa-file"></i> --}}
                    </a>
                    {{-- <a href="" class="btn btn-primary btn-sm">Direcciones <i class="fa fa-home"></i></a> --}}
                    <a href="{{ route('paciente.edit',$p->run) }}" class="btn btn-info btn-sm">Editar <i class="fa fa-edit"></i></a>
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