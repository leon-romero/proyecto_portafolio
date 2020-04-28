<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo\FichaProveedor;

class FichaProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=FichaProveedor::all();    
       return view('admin.proveedor.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // return $request;
            $fp = new FichaProveedor();
            $fp->username               =  $request->input('username');
            $fp->password               = '12345';
            $fp->nombre_empresa         = $request->input('nombre_empresa');
            $fp->rubro                  = $request->input('rubro');
            $fp->telefono               = $request->input('telefono');
            $fp->correo                 = $request->input('correo');
            $fp->bloqueo                = 0;
            $fp->activo                 = 1;
            $fp->save();
            return redirect()->route('proveedor.index')->with('success','Se ha creador correctamente.');

        } catch (\Throwable $th) {
             return $th;

            return back()->with('info','Error Intente nuevamente.');
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $pro = FichaProveedor::where('id_ficha_proveedor',$id)->firstOrFail();
            return view('admin.proveedor.edit',compact('pro'));
        } catch (\Throwable $th) {
            // return $th;
            return redirect()->route('proveedor.index')->with('info','Error intente nuevamente.');

        }
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
        try {
            $fp = FichaProveedor::where('nombre_proveedor',$nombre_proveedor)->firstOrFail();
            $fp->username               =  $request->input('username');
            //$fp->password               = '12345';
            $fp->nombre_empresa         = $request->input('nombre_empresa');
            $fp->rubro                  = $request->input('rubro');
            $fp->telefono               = $request->input('telefono');
            $fp->correo                 = $request->input('correo');
            // $fp->bloqueo     = 0;
            // $fp->activo      = 1;
            $fp->update();
            return back()->with('success','Se ha actualizado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('danger','Error Intente nuevamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
