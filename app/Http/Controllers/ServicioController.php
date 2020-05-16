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

    public function create()
    {
       return view('admin.servicio.create');
    }

    
    public function store(Request $request)
    {
        try {
            //code...
    
            $s = new Servicio();
            $s->nombre_servicio = $request->input('nombre_servicio');
            $s->mostrar = 1;
            $s->save();
            
            return redirect()->route('servicio.index')->with('success','Se ha creado correctamente');

        } catch (\Throwable $th) {
            return back()->with('danger','error intente nuevamente');
        }   
    }
}
