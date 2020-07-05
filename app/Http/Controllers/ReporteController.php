<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\BoletaServicio;
use App\Modelo\Odontologo;
use DB;



class ReporteController extends Controller
{
    public function index(){
        //cantidad de personas,odontologo,empleados

        //productos utilizados total

        // agendas  - recibidas - aceptadas
        $espera = Odontologo::count();
        $cancelada = 0;
        $realizadas = 0;
        $total_atencion = array('espera' => $espera, 'canceladas' => $cancelada, 'realizadas' => $realizadas );

        // total de solicitudes -- esperas - recibidas


        // total de boletas
        $total_boletas  = BoletaServicio::count();
        
        //SELECT COUNT(*) AS total, id_odontologo FROM boleta_servicio GROUP BY id_odontologo;
        $total_atencion_odontologo = DB::select("SELECT COUNT(*) AS total, id_odontologo, CONCAT(CONCAT(odon.nombres,''),odon.apellidos) as nombre_completo FROM boleta_servicio bos JOIN odontologo odon using(id_odontologo) GROUP BY bos.id_odontologo");

        

        $r = ['total_boletas',
              'total_atencion_odontologo',
              'total_atencion'

            ];


        return view('admin.reporte.index',compact($r));
    }
}
