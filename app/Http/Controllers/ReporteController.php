<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\BoletaServicio;



class ReporteController extends Controller
{
    public function index(){
        // Total de servicios al mes
        
        // productos por meses

        // cantidad de personas mes

        // numero de atencion por odontologo
        $boletas = new BoletaServicio();

        return view('admin.reporte.index');
    }
}
