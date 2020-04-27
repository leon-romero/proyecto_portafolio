@php
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      $cliente = App\Modelo\Cliente::where('id_cliente',auth('cliente')->user()->id_cliente)->first();
      // dd($cliente);
      // $nombreUsuario =  auth('cliente')->user()->nombres;
      $comunas = App\Modelo\Comuna::get();
      $regiones = App\Modelo\Region::get();
      $detalleCanasta = App\Modelo\DetalleCanasta::where('id_canasta',$canasta->id_canasta)->get(); 
      $direcciones = App\Modelo\Direccion::where('id_cliente',$cliente->id_cliente)->where('activo',1)->orderBy('created_at','desc')->get();
    }
@endphp
@extends('shop.layout.layout')

@section('contenido')
  <section class="bg-fondo my-2">
    <div class="container">
        <i class="fa fa-map-marker"></i> <strong>Despacho en:</strong>   <br>
      <small><strong>Martes:</strong> Chicureo, Las Condes, Lo Barnechea y Vitacura. | <strong>Viernes:</strong> La Reina, Peñalolén, Ñuñoa y Providencia.</small>
    </div>
  </section>    

  <div class="container">
    <form action="{{ route('shop.comprar') }}" method="post">
      {!! csrf_field() !!}
      <input type="hidden" name="id_canasta" value="{{ $canasta->id_canasta }}">
      <div class="row">     

        <h3>Canasta solicitada</h3>
        
        {{-- Parte 1 Direccion --}}
        <div class="col-md-12">   
          {{-- Direcciones Cliente --}}
          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Detalles pedido
            </div>
            <div class="card-body">          
              <div class="box-body table-responsive">         
            
                <h2> </h2>
                <div class="table-responsive">
                  <table border="1" class="table-sm">
                    <thead>
                      <tr>
                        {{-- <th>Fecha Creación</th> --}}                   
                        <th>Nombre Canasta</th>
                        <th>Detalle</th>  
                        {{-- <th>Cantidad</th> --}}
                        {{-- <th>Precio</th> --}}
                        <th><strong>Total</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>               
                      <tr>
                        <td>{{ $canasta->nombre_canasta }} <small>({{ $canasta->tipoCanasta->nombre }})</small></td>
                        <td><small>
                          @foreach ($detalleCanasta as $d)
                          @php
                          $cantidad = 0;
                          switch ($d->cantidad) {
                            case '0.5':
                              $cantidad = '½';
                              break;
                            case '1.0':
                              $cantidad = '1';
                              break;
                            case '1.5':
                              $cantidad = '1½';
                              break;
                            case '2.0':
                              $cantidad = '2';
                              break;
                            case '2.5':
                              $cantidad = '2½';
                              break;
                            case '3.0':
                              $cantidad = '3';
                              break;
                            default:
                              $cantidad = $d->cantidad;
                              break;
                          }  
                          @endphp                        
                          {{ $cantidad . "  ". $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }},
                          @endforeach
                        </small></td>
                        {{-- <td>1</td> --}}
                        {{-- <td><small>{{ $canasta->dinero_texto() }}</small></td> --}}
                        <td><strong>{{  $canasta->dinero_texto() }}</strong></td>
                      </tr>                                                  
                    </tbody>
                  </table>
                </div>
              </div>
              {{-- <small class="text-muted pull-right">Publicado el </small> --}}
            </div>
          </div>   
        </div>      
        <div class="col-md-6">   
          {{-- Direcciones Cliente --}}
          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Domicilios guardados
            </div>
            <div class="card-body">          
              <div class="box-body table-responsive">         
                <h5>Seleccione una dirección de despacho</h5>
                <div class="table-responsive">
                  <table class="table table-striped">                
                    <tbody>
                      @if (count($direcciones)>0)
                      @php
                          $r = "required checked";
                      @endphp
                      @foreach ($direcciones as $d)
                      <tr>
                        {{-- <td>{{ date('d/m/Y', strtotime($d->created_at))}}</td> --}}
                        <td> <input type="radio" name="id_direccion" value="{{ $d->id_direccion }}" id="" {{ $r }}></td>
                        @php
                          $r = "";
                        @endphp
                        <td><small>{{ $d->direccion." - ".$d->comuna->nombre_comuna." - ".$d->comuna->region->nombre_region}}</td>
                      </tr>  
                      @endforeach   
                      @else
                      <tr>
                        <td><p>No se han encontrado direcciones asociadas a su cuenta.</p></td>
                      </tr>
                      <tr>
                        <td><a href="{{ route('shop.perfil.direcciones') }}" class="btn btn-info float-right">Agregar dirección</a></td>
                      </tr> 
                      @endif                                 
                    </tbody>
                  </table>
                </div>
              </div>
              {{-- <small class="text-muted pull-right">Publicado el </small> --}}
            </div>
          </div>  
        </div>  
        <div class="col-md-6">
          {{-- Nuevo domicilio --}}
          <div class="card mt-4">
            {{-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> --}}
            <div class="card-body">
              <h5 class="card-title">Comentario <small>(opcional)</small></h5>      
              {{-- <p><strong>Utilza este formualario para cambiar tu dirección de correo electrónico.</strong><br>Deberás confirmar tu nuava dirección en un correo electronicónico que te enviamos.</p> --}}
              <hr>             
              {{-- Comuna --}}
              <div class="row form-group">
                <div class="col-md-12">
                  <textarea class="form-control" id="texto" name="comentario_cliente" autocomplete="off" rows="3"></textarea>
                </div>  
              </div>                     
            </div>
            <div class="card-footer">
                <button class="btn btn-success float-right">Confirmar Pedido</button>  
            </div>
          </div>
        </div>  
      </div>
  </form>
  
  </div>
  
  {{-- Mensajes --}}
  <div id="snackbar">Message Ok..</div>
@stop
@section('scripts')  
  {{-- Mensaje --}}
  @if (session('info'))
  <script>        
    snackbarUp('{{ session('info') }}');
  </script>
  @endif
  <script>
      
      var comunas = [
        @foreach ($comunas as $c)
          {'nombre':'{{ $c->nombre_comuna }}','id':'{{ $c->id_comuna }}','id_region':'{{ $c->id_region}}'},
        @endforeach
      ];
      var regiones = [
        @foreach ($regiones as $r)
          {'nombre':'{{ $r->nombre_region }}','id_region':'{{ $r->id_region }}'},
        @endforeach
      ];

      CargarRegion();      
      CargarComuna();

      function CargarRegion(){
        var $select = $('#select_region');
        $select.find('option').remove();
        //alert(options);
        $.each(regiones, function(key,value) {            
            $select.append('<option value=' + value.id_region + '>' + value.nombre + '</option>');
        });
      }

      function CargarComuna(){
        var $select = $('#select_comuna');
        $select.find('option').remove();
        //alert(options);
        var id_r = document.getElementById("select_region").value;
        var coms = comunas.reduce( function(salida, xx){
          if(xx.id_region==id_r){
            salida.push(xx);
          }
          return salida;
        },[]);
        // }result => if(result.id_region==id_r) );
        // console.log(id_r);
        $.each(coms, function(key,value) {            
            $select.append('<option value=' + value.id + '>' + value.nombre + '</option>');
        });
      }

  </script>
@stop