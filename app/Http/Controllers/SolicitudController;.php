<?php

namespace App\Http\Controllers;

use App\Modelo\Empleado;
use App\Modelo\Producto;
use App\Modelo\FichaProveedor;
use App\Modelo\OrdenEmpleado;

use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitud = Producto::get();
        return view('admin.solicitud.index',compact('solicitud'));
    }
}
