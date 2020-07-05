@extends('layout.layout')
@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
@stop
@section('contenido')
  <section class="content-header">
    <h1>Reportes Generales</h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-white"><i class="fas fa-user-astronaut"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Clientes</span>
            <span class="info-box-number">{{$total_personal['clientes']}}<small></small></span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-purple"><i class="fas fa-tooth"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Odontólogos</span>
            <span class="info-box-number">{{$total_personal['odontologos']}}</span>
          </div>
        </div>
      </div>

      <div class="clearfix visible-sm-block"></div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="far fa-address-card"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Empleados</span>
            <span class="info-box-number">{{$total_personal['empleados']}}</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fas fa-address-book"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Proveedores</span>
            <span class="info-box-number">{{$total_personal['proveedores']}}</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fas fa-file"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Boletas emitidas</span>
            <span class="info-box-number">{{$total_boletas}}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Resumen de atenciones</h3>
          </div>
          <div class="box-body">
            <div id="canvas-holder">
              <canvas id="bar-atenciones" width="800" height="450"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Total de personas atendidas por los odontólogos</h3>
          </div>
          <div class="box-body">
            <div id="canvas-holder">
              <canvas id="bar-odontologo" width="800" height="450"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Resumen de solicitudes a los proveedores</h3>
          </div>
          <div class="box-body">
            <div id="canvas-holder">
              <canvas id="bar-solicitud" width="800" height="450"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('scripts')
<script>
  
  // total de atencion odontologo
  new Chart(document.getElementById("bar-odontologo"), {
    type: 'pie',
    data: {
      labels: [
        
        @foreach ($total_atencion_odontologo as $k)
          @foreach ($k as $key => $value)
            @if($key == 'nombre_completo')
              '{{ $value }}',
            @endif
          @endforeach
        @endforeach
      ],
      datasets: [
        {
          label: "Total de atención odontologo",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [
            @foreach ($total_atencion_odontologo as $k)
              @foreach ($k as $key => $value)
                @if($key == 'total')
                  '{{ $value }}',
                @endif
              @endforeach
            @endforeach
          ]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Total de atenciones de los odontologos'
      }
    }
  });
    
  // atenciones
  new Chart(document.getElementById("bar-atenciones"), {
    type: 'pie',
    data: {
      labels: ["En Espera","Canceladas","Realizadas"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#c45850", "#3cba9f"],
        data: [{{$total_atenciones['espera']}},{{$total_atenciones['canceladas']}},{{$total_atenciones['realizadas']}}]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Total de Atenciones'
      }
    }
  });
  //solicitudes
  new Chart(document.getElementById("bar-solicitud"), {
    type: 'pie',
    data: {
      labels: ["En Espera", "Recibidas"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: ['{{$total_solicitudes['esperas']}}', '{{$total_solicitudes['recibidas']}}']
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'total de solicitudes'
      }
    }
  });

</script>



@stop



