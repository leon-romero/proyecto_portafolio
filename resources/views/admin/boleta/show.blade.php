@extends('layout.layout')

@section('contenido')
@php
	$detalle = App\Modelo\DetalleServicio::where('id_servicio', $b->id_servicio)->get();
@endphp
<section class="content-header">
  <h1>Detalle del Servicio</h1>
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
                <h3 class="box-title">Todos los productos</h3>
                <br>
                <br>
                <button type="button" class="btn btn-danger  float-right btn-sm" onclick="descargarPDF('tabla','Reporte')"> <i class="fa fa-file-pdf"></i> Descargar PDF </button>
                <button type="button" class="btn btn-success float-right btn-sm mr-2" onclick="tableToExcel('tabla','ReporteExcel')"><i class="fa fa-file-excel"></i> Descargar Excel</button>      
              </div>
              <br>
              <br>
            <div class="box-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Detalle Orden</h4>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="tabla" class="display table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%">   
                        <tbody>
                            <tr>
                                <td>N° Boleta {{ $b->id_boleta_servicio }}</td>
                                @php											
									$proxima_fecha = date_format(date_create($b->fecha_servicio), 'd-m-Y') . " " . $b->horario;
                                @endphp
                                <th class="text-right">Fecha:  {{ $proxima_fecha }}</td>
                            </tr>
                            <tr>
                                <td>Cliente:  {{ $b->nombre_cliente }}</td>
                                <td>Servicio: {{ $b->nombre_servicio }}</td>
                            </tr>
                                <td>Run Cliente: {{ $b->cliente->run }}</td>
                                <td>Odontólogo:  {{ $b->nombre_odontologo }}</td>
                            <tr>
                                <td colspan="2" class="text-center"><strong>Productos del servicio</strong></td>
                            </tr>
                            <tr>
                                <td >Nombre</td>
								<td >Cantidad</td>
                            </tr>
                            @foreach ($detalle as $d)
									<tr>
										<td>{{ $d->producto->nombre_producto }}</td>
										<td>{{ $d->cantidad }}</td>									
									</tr>
							@endforeach
                        </tbody>    
                    </table>
                </div>
            </div>
            <div class="box-footer">	
                <a href="/boleta" class="btn btn-danger">Volver</a>
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