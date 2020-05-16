<?php

namespace App\Http\Controllers;

use App\Modelo\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios=Servicio::get();    
        //  return $pacientes;
       return view('admin.servicio.index',compact('servicios'));
    }
}
