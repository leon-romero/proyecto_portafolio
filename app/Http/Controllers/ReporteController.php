<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\BoletaServicio;
use App\Modelo\Odontologo;
use DB;
use App\Modelo\ReservarHora;
use App\Modelo\OrdenEmpleado;
use App\Modelo\Empleado;
use App\Modelo\FichaCliente;
use App\Modelo\FichaProveedor;


class ReporteController extends Controller
{
    public function index(){
        //cantidad de personas,odontologo,empleados,cliente,proveedor
        $odontologos = Odontologo::count();
        $empleados = Empleado::count();
        $clientes = FichaCliente::count();
        $proveedores =FichaProveedor::count();
        $total_personal = array('odontologos' => $odontologos, 'empleados' => $empleados,'clientes' => $clientes, 'proveedores' => $proveedores);

        // agendas  - recibidas - aceptadas
        $espera =     ReservarHora::where("id_estado_reserva",1)->count();
        $cancelada =  ReservarHora::where("id_estado_reserva",3)->count();
        $realizadas = ReservarHora::where("id_estado_reserva",2)->count();
        $total_atenciones = array('espera' => $espera, 'canceladas' => $cancelada, 'realizadas' => $realizadas );

        // total de solicitudes -- esperas - recibidas
        $esperas =   OrdenEmpleado::where('enviado',2)->count();
        $recibidas = OrdenEmpleado::where('enviado',1)->count(); 
        $total_solicituces = array('esperas' => $esperas, 'recibidas' => $recibidas);

        // total de boletas
        $total_boletas  = BoletaServicio::count();
        
        //SELECT COUNT(*) AS total, id_odontologo FROM boleta_servicio GROUP BY id_odontologo;
        $total_atencion_odontologo = DB::select("SELECT COUNT(*) AS total, id_odontologo, CONCAT(CONCAT(odon.nombres,''),odon.apellidos) as nombre_completo FROM boleta_servicio bos JOIN odontologo odon using(id_odontologo) GROUP BY bos.id_odontologo");

        

        $r = ['total_boletas',
              'total_atencion_odontologo',
              'total_atenciones',
              'total_personal',
              'total_solicituces',
            ];

        $resultado = compact($r);    
        //return $resultado['total_boletas'];
        // foreach ($resultado['total_atencion_odontologo'] as $k) {
        //     foreach ($k as $key => $value) {
        //         return $key.' '.$value;
        //     }
        // }

        return view('admin.reporte.index',compact($r));

    }
}
