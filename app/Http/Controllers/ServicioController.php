<?php

namespace App\Http\Controllers;

use App\Modelo\Servicio;
use App\Modelo\Producto;
use App\Modelo\DetalleServicio;
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

    public function producto($id)
    {
        $productos = DetalleServicio::where('id_servicio',$id)->get();
        $s = Servicio::find($id);
        $products = Producto::get();

        foreach ($products as $p) {
            foreach ($productos as $pro) {
                if($p->id_producto == $pro->id_producto){
                    $p->activo = 0;
                    break;
                }
            }
        }

        return view('admin.servicio.producto.index',compact('productos','s','products'));

    }

    public function productoStore($id,Request $request)
    {
        $d = new DetalleServicio();
        $d->id_servicio = $id;
        $d->id_producto = $request->id_producto;
        $d->cantidad = 0;
        $d->save();
        return back()->with('success','Se ha actualizado correctamente');
    }

    public function productoUpdate($id,$id_pro,Request $request)
    {
        $d = DetalleServicio::find($id_pro);
        $d->cantidad = $request->cantidad;
        $d->update();
        return back()->with('success','Se ha actualizado correctamente');
    }

    public function productoDelete($id,$id_pro)
    {
        $d = DetalleServicio::find($id_pro);
        $d->delete();
        return back()->with('success','Se ha eliminado');
    }
}
