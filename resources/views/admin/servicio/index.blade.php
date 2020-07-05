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

    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          {{-- <h3 class="box-title">Todos los Servicios</h3> --}}
        </div>
        <div class="col-md-12 text-center">
          <a href="{{ route('servicio.create')}}" class="btn btn-success btn-sm">Nuevo servicio</a>
        </div>
        <br>
        <br>       
        <div class="box-body table-responsive">
          <table class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nombre</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($servicios)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($servicios as $s)
                <tr> 
                  <td>{{ $s->nombre_servicio }}</td>
                  <td>
                    <a href="{{ route('servicio.edit',$s->id_servicio) }}" class="btn btn-info btn-sm">Editar</a>
                  </td>
                  <td>
                    <a href="{{ route('servicio.producto',$s->id_servicio) }}" class="btn btn-success btn-sm">Agregar Producto</a>
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