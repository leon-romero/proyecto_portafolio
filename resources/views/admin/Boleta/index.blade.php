@extends('layout.layout')

@section('contenido')
<section class="content-header">
  <h1>Lista de productos</h1>
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
          <h3 class="box-title">Todos los productos</h3>
        </div>
        <br>
        <br>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tabla" class="datatable table table-striped table-sm " cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre producto</th>
                <th>Stock</th>
                <th>Stock Critico</th>
              </tr>
            </thead>

            <tbody>
              @if (count($productos)>0 )
              @php
                  $i=1;
              @endphp  
              @foreach ($productos as $p)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $p->nombre_producto }}</td>
                  
                 @php
                    $color;
                    if ($p->stock == $p->stock_critico) {
                       $color = "bg-warning";
                    }
                    if ($p->stock < $p->stock_critico) {
                      $color = "bg-danger";
                    }
                    if ($p->stock > $p->stock_critico){
                      $color = "bg-success";
                    }
                 @endphp 
                  
                  <td class="{{$color}}">{{$p->stock}}</td> 
                  
                  <td>{{ $p->stock_critico }}</td>
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