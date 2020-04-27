@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Docuemento del Paciente</h1>
  {{-- <ol class="breadcrumb"> --}}
    {{-- <li><a href=""><i class="fa fa-home"></i> Home</a></li> --}}
    {{-- <li class="active">Clientes</li> --}}
  {{-- </ol> --}}
</section>
<section class="content">
  <div class="row">
    
    @include('layout.alerta')

    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><a href="{{ route('paciente.index')}}" class="btn btn-danger btn-sm pull-left">Volver</a>   Todos los documentos</h3>
        </div>
        {{-- <div class="col-md-12 text-center">
          
        </div> --}}
        <br>
        <br>
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre Documento</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@stop