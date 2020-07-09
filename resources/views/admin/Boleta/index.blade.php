@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de Boletas de Servicios</h1>
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
          <h3 class="box-title">Todas las Boletas</h3>
          <button type="button" class="btn btn-danger  float-right btn-sm" onclick="descargarPDF('tabla','Reporte')"> <i class="fa fa-file-pdf"></i> Descargar PDF </button>
          <button type="button" class="btn btn-success float-right btn-sm mr-2" onclick="tableToExcel('tabla','ReporteExcel')"><i class="fa fa-file-excel"></i> Descargar Excel</button>      
      
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Fecha Realizado</th>
                <th>Horario</th>
                <th>Servicio</th>
                <th>Cliente</th>
                <th>Odontólogo</th>
              </tr>
            </thead>

            <tbody>
              
                @php
										$i=1;	
									@endphp
									@foreach ($boletas as $b)
									@php
										$text_color = "";
										$bg_color = "";
                  
										$proxima_fecha = date_format(date_create($b->created_at), 'd-m-Y');

									@endphp
									<tr class="{{ $text_color }} {{ $bg_color }}">
										<td class="">	<a href="{{ route('boletas.show',$b->id_boleta_servicio) }}">BOLETA-{{ $b->id_boleta_servicio }}</a></td>							
										<td>{{ $proxima_fecha }}</td>						
										<td>{{ $b->horario }}</td>
										<td>{{ $b->nombre_servicio }}</td>
										<td>{{ $b->nombre_cliente }}</td>
										<td>{{ $b->nombre_odontologo }}</td>
									</tr>
									@endforeach

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@stop

@section('scripts')
<script src="/bower_components/jspdf/js/jspdf.min.js"></script>
<script src="/bower_components/jspdf/js/jspdf.plugin.autotable.js"></script>
<script>
  function descargarPDF(table,nombre) {           
      var doc = new jsPDF();      
      doc.autoTable({html: `#${table}`});    
      doc.save( nombre+'.pdf');      
  }
</script>
<script src="/dist/js/excel.js"></script>

@stop
