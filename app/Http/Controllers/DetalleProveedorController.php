<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modelo\FichaProveedor;
use App\Modelo\DetalleProveedor as Detalle;
use App\Modelo\Producto;

class DetalleProveedorController extends Controller
{
    public function store(Request $request)
    {
        try {
            $d = new Detalle();
            $d->id_producto = $request->input('id_producto');
            $d->id_ficha_proveedor = $request->input('id_ficha_proveedor');
            $d->save();
            return back()->with('success','Se ha incorporado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('info','Error Intente nuevamente.');
        }
    }


    public function destroy($id)
    {
        try {
            $d = Detalle::findOrFail($id)->delete();
            return back()->with('success',"Se ha eliminado"); 
        } catch (\Throwable $th) {
            return back()->with('info',"No se ha eliminado"); 
        }
    }
}
