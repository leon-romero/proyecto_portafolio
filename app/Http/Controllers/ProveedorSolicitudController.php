<?php

namespace App\Http\Controllers;

use App\Modelo\OrdenEmpleado;
use Illuminate\Http\Request;


class ProveedorSolicitudController extends Controller
{
    public function index()
    {
        $ordenes = OrdenEmpleado::where('id_ficha_proveedor', auth('proveedor')->user()->id_ficha_proveedor )->where('enviado',2)->get();

        return $ordenes;
    }

    
}
