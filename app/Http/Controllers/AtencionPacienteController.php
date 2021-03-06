<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\ReservarHora as Reserva;
use App\Modelo\FichaCliente as Cliente;


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

        $r=Reserva::where('id_reservar_hora',$id)->where('activo',1)->firstOrFail();
        return view('odontologo.show',compact('r'));
    }

    public function calendario()
    {
        $reservas=Reserva::get();
        return view('odontologo.calendario',compact('reservas'));
    }

    
    public function historial()
    {
        $reservas = array();
        $c = null;
        return view('odontologo.historial',compact('reservas','c'));
    }

    
    public function historialBuscar(Request $request)
    {
        return redirect()->route('atencion.historial.rut',$request->input('run'));
    }
    
    public function historialRut($run)
    {
        try {
            $c = Cliente::where('run',$run)->firstOrFail();
            $reservas = Reserva::where('id_ficha_cliente',$c->id_ficha_cliente)->get();
            return view('odontologo.historial',compact('reservas','c'));
        } catch (\Throwable $th) {
            return back()->with('info','Error Intente nuevamente.');
            // return $th;
        }
    }
}
