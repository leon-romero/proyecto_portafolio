<?php

namespace App\Http\Controllers;

use App\Modelo\Servicio;
use Illuminate\Http\Request;

use App\Http\Requests\CreateServicioRequest as ServicioRequest;


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

    
    public function store(ServicioRequest $request)
    {
        try {
            $s = new Servicio();
            $s->nombre_servicio = $request->input('nombre_servicio');
            $s->mostrar = 1;
            $s->save();
            
            return redirect()->route('servicio.index')->with('success','Se ha creado correctamente');

        } catch (\Throwable $th) {
            return back()->with('danger','error intente nuevamente');
        }   
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s=Servicio::where('id_servicio',$id)->firstOrFail();    
        return view('admin.servicio.edit',compact('s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            // $p = Producto::where('id_producto',$id)->firstOrFail();
        try {
            $s = Servicio::where('id_servicio',$id)->firstOrFail();
            $s->nombre_servicio = $request->input('nombre_servicio');
            $s->update();
            
            // return redirect()->route('servicio.index')->with('success','Se ha creado correctamente');
            return back()->with('success','Se ha actualizado correctamente');

        } catch (\Throwable $th) {
            return back()->with('danger','error intente nuevamente');
        } 
    }
}
