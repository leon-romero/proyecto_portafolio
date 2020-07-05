<?php

namespace App\Http\Controllers;

use App\Modelo\OrdenEmpleado;
use App\Modelo\DetalleOrden;
use Illuminate\Http\Request;


class ProveedorSolicitudController extends Controller
{
    public function index()
    {
        $ordenes = OrdenEmpleado::where('id_ficha_proveedor', auth('proveedor')->user()->id_ficha_proveedor )
                                ->where('enviado',1)
                                ->get();
        return view('proveedor.index',compact('ordenes'));
    }

    public function show($id){
        try {
            $orden = OrdenEmpleado::where('id_orden_empleado',$id)->firstOrFail();
            $detalles = DetalleOrden::where('id_orden_empleado',$id)->get();
            return view('proveedor.show',compact('orden','detalles'));
        } catch (\Throwable $th) {
            // return redirect()->route('home');
            return $th;
        }        
    }

    public function detalles($id){
        try {
            $orden = OrdenEmpleado::where('id_orden_empleado',$id)->firstOrFail();
            $detalles = DetalleOrden::where('id_orden_empleado',$id)->get();
            return view('proveedor.realizadas.show',compact('orden','detalles'));
        } catch (\Throwable $th) {
            // return redirect()->route('home');
            return $th;
        }        
    }


    public function realizadas()
    {
        $ordenes = OrdenEmpleado::where('id_ficha_proveedor', auth('proveedor')->user()->id_ficha_proveedor )
                                ->where('enviado',2)
                                ->get();
        return view('proveedor.realizadas.index',compact('ordenes'));
    }
}
