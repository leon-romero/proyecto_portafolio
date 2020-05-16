<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\ReservarHora as Reserva;

class AtencionPacienteController extends Controller
{
    public function index()
    {
        $fechaHoy =  date('Y-m-d');
        $reservas=Reserva::where('fecha_reserva',$fechaHoy)->get();
        // return Reserva::get();
        return view('odontologo.index',compact('reservas'));
    }
}
