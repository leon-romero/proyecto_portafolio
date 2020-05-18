<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\ReservarHora as Reservar;
use App\Modelo\Horario;

class ApiController extends Controller
{
    public function horasDisponibles($fecha){
        
            $reservas = Reservar::where('fecha_reserva',$fecha)->get();
            $horarios = Horario::get();

            foreach ($reservas as $r) {
                foreach ($horarios as $h) {
                    if($r->id_horario==$h->id_horario){
                        if($r->id_estado_reserva!=0){
                            $h->activo = 0;
                        }  
                    }
                }
            }
            return $horarios;     
    }
}
