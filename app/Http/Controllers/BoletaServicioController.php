<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\BoletaServicio;

class BoletaServicioController extends Controller
{
    public function index(){
        $boletas = BoletaServicio::get();
        return view('admin.boleta.index',compact('boletas'));
    }

    public function show($id){
        $b = BoletaServicio::findOrFail($id);
        return view('admin.boleta.show',compact('b'));
    }

    public function estadistica(){
        
    }
}
