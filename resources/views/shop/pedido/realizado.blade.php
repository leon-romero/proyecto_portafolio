@php
// dd($pedido);
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      $cliente = App\Modelo\Cliente::where('id_cliente',auth('cliente')->user()->id_cliente)->first();
      $canasta = App\Modelo\Canasta::where('id_canasta',$pedido->id_canasta)->first();

      $detalleCanasta = App\Modelo\DetallePedido::where('id_pedido',$pedido->id_pedido)->get(); 
      $direcciones = App\Modelo\Direccion::where('id_cliente',$cliente->id_cliente)->orderBy('created_at','desc')->get();

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
    <div class="row">
      {{-- Parte 1 --}}
      <div class="col-md-6">
        {{-- Nuevo domicilio --}}
        <div class="card mt-4">
          {{-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> --}}
          <div class="card-body">
            <h5 class="card-title">¡Gracias por su solicitud de pedidos! <small></small></h5>      
            {{-- <p><strong>Utilza este formualario para cambiar tu dirección de correo electrónico.</strong><br>Deberás confirmar tu nuava dirección en un correo electronicónico que te enviamos.</p> --}}
            <hr>             
            <div class="card mb-3 col-md-6" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="/img/rinconorganico.png" class="card-img img-responsive" width="100px" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Su código de transferencia es <br><strong>{{ $pedido->codigo }}</strong></h5>
                    <p class="card-text">Es código lo utilizamos para identificar su compra, es por ello que debe agregarlo en el comentario de su transferencia electrónica.</p>
                    <p class="card-text"><small class="text-muted">Fecha solicitud {{ date('d/m/Y H:m', strtotime($pedido->created_at))}}</small></p>
                  </div>
                </div>
              </div>
              </div>                 
          </div>
          <div class="card-footer">
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
                <br>
                <p><strong>Domicilio:</strong> {{ $pedido->direccion->direccion ." - " . $pedido->direccion->comuna->nombre_comuna . " - " . $pedido->direccion->comuna->region->nombre_region }}</p>
                <p><strong>Comentario:</strong> {{ $pedido->comentario_cliente }}</p>
              </div>
              {{-- <button class="btn btn-success float-right">Confirmar Pedido</button>   --}}
          </div>
        </div>
      </div>
      {{-- </div> --}}
      <hr>
      {{-- Parte 2 --}}
      <div class="col-md-6">    
        {{-- Historial pedidos --}}
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            <i class="fas fa-university"></i>
            Datos de transferencia
          </div>
          <div class="card-body">          
            <div class="box-body table-responsive">        

              <h2> </h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">                  
                  <tbody>                    
                    <tr>
                      <td>Nombre:</td>
                      <td>Nicolás Nogués</td>    
                    </tr>
                    <tr>
                      <td>Banco:</td>
                      <td>Banco de Chile</td>    
                    </tr>  
                    <tr>
                      <td>Cuenta:</td>
                      <td>Cuenta Corriente</td>    
                    </tr>
                    <tr>
                      <td>Número de Cuenta:</td>
                      <td>04420107710</td>    
                    </tr>
                    <tr>
                      <td>Rut:</td>
                      <td>18.765.778-4</td>    
                    </tr> 
                    <tr>
                      <td>Correo:</td>
                      <td>rinconorganicoynatural@gmail.com</td>    
                    </tr>
                    <tr>
                      <td>Comentario:</td>
                      <td><strong>{{ $pedido->codigo }}</strong></td>    
                    </tr>            
                  </tbody>
                </table>
              </div>
            </div>
            {{-- <small class="text-muted pull-right">Publicado el </small> --}}
          </div>
        </div>    
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
@stop
@section('scripts')   
 
@stop