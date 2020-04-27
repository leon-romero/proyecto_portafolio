@php
// dd($pedido);
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      $cliente = App\Modelo\Cliente::where('id_cliente',auth('cliente')->user()->id_cliente)->first();
      $canasta = App\Modelo\Canasta::where('id_canasta',$pedido->id_canasta)->first();
      $detalleCanasta = App\Modelo\DetallePedido::where('id_pedido',$pedido->id_pedido)->get(); 
      $direcciones = App\Modelo\Direccion::where('id_cliente',$cliente->id_cliente)->orderBy('created_at','desc')->get();
      $alert="";
      $estado="";
      switch ($pedido->id_estado_pedido) {
        case 2:
          $alert="alert-primary";
          $estado="Pagado";
          break;
        case 3:
          $alert="alert-danger";
          $estado="Cancelado";
          break;
        case 4:
          $alert="alert-success";
          $estado="Entregado";
          break;
        default:
          # code...
          break;
      }
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
      <div class="col-md-12">
       
      </div>
      {{-- Parte 1 --}}
      <div class="col-md-12">
        {{-- Nuevo domicilio --}}
        <div class="card mt-4">
          {{-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> --}}
          <div class="card-body">
            <h5 class="card-title"> <small></small></h5>    
            <div class="alert {{ $alert }}" role="alert">
              Este pedido se encuentra <strong>{{ $estado }}</strong>.
            </div>  
            {{-- <p><strong>Utilza este formualario para cambiar tu dirección de correo electrónico.</strong><br>Deberás confirmar tu nuava dirección en un correo electronicónico que te enviamos.</p> --}}
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
                                                
                            {{ $d->cantidadS() . "  ". $d->tipoProducto->unidad->nombre_unidad . " " . $d->tipoProducto->nombre_tipo }},
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
    </div>
  </div>
  <br>
  <br>
  <br>
@stop
@section('scripts')   
 
@stop