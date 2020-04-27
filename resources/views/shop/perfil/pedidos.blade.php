@php
    $isLogin = false;
    if (auth('cliente')->check()){
      $isLogin = true;
      $cliente = App\Modelo\Cliente::where('id_cliente',auth('cliente')->user()->id_cliente)->first();
      // dd($cliente);
      // $nombreUsuario =  auth('cliente')->user()->nombres;
      $pedidos = App\Modelo\Pedido::where('id_cliente',$cliente->id_cliente)->orderBy('created_at','desc')->get();
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
      <div class="col-md-3">
        @include('shop.layout.config')
      </div>

      {{-- Parte 2 --}}
      <div class="col-md-9">    
        {{-- Historial pedidos --}}
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Historial de pedidos
          </div>
          <div class="card-body">          
            <div class="box-body table-responsive">        

              <h2>Historial </h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Fecha</th>
                      <th>Tipo</th>
                      <th>Nombre</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($pedidos)>0)
                    @foreach ($pedidos as $p)
                    <tr>
                      <td><a href="{{ route('shop.perfil.historial.cod',$p->codigo) }}">{{ $p->codigo }}</a></td>
                      <td><small>{{ date('d/m/Y', strtotime($p->created_at))}}</small></td>
                      <td><small>{{ $p->canasta->tipoCanasta->nombre }}</small></td>
                      <td>{{ $p->canasta->nombre_canasta }}</td>
                      <td>
                      @switch($p->id_estado_pedido)
                        @case(1)
                          <p class="badge badge-warning">Pendiente</p>
                          @break
                        @case(2)                        
                          <p class="badge badge-primary">Pagado</p>
                          @break
                        @case(3)
                          <p class="badge badge-danger">Cancelado</p>
                          @break
                        @case(4)
                          <p class="badge badge-success">Entregado</p>
                          @break                              
                      @endswitch
                      </td>         
                    </tr>  
                    @endforeach   
                    @else
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
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

    </div>
  </div>
@stop
@section('scripts')  
 
@stop