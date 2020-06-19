<?php

namespace App\Http\Controllers;

use App\Modelo\Empleado;
use App\Modelo\Producto;
use App\Modelo\FichaProveedor;
use App\Modelo\OrdenEmpleado;

use Illuminate\Http\Request;

class MonitoreoController extends Controller
{
    public function index()
    {
        $productos = Producto::get();
        return view('admin.monitoreo.index',compact('productos'));
    }
}
