@php
    $foto = "";
    if(auth('empleado')->check()){
      $foto = "/img/cliente2.jpg";
    }else if(auth('cliente')->check()){
      $foto = "/img/odontologo.jpg";
    }else if(auth('odontologo')->check()){
      $foto = "/img/diente.jpg";
    }else if(auth('proveedor')->check()){
      $foto = "/img/proveedor.jpg";
    }
@endphp
@extends('layout.layout')
@section('style')
@stop
@section('contenido')



  <section class="content-header">
    <h1>
      Buenos Dias
      <small> Una linda sonrisa alegra el día</small>
    </h1>

  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">

        <img src="{{ $foto }}" width="100%"  alt="">
      </div>
    </div>
  </section>
@stop

@section('scripts')

@stop
