<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\ReservarHora as Reserva;

class AtencionPacienteController extends Controller
{
    public function index()
    {
        $fechaHoy =  date('Y-m-d');
        $reservas=Reserva::where('fecha_reserva',$fechaHoy)->where('activo',1)->get();
        // return Reserva::get();
        return view('odontologo.index',compact('reservas'));
    }

    public function show($id){
        return $id;
        $r=Reserva::where('id_reservar_hora',$id)->where('activo',1)->firstOrFail();
        return view('odontologo.index',compact('r'));
    }
}
