<?php

namespace App\Http\Controllers;

use App\Modelo\Producto;
use Illuminate\Http\Request;

use App\Http\Requests\CreateProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('admin.producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductoRequest $request)
    {
        try {
            $p = new Producto();
            $p->nombre_producto = $request->input('nombre_producto');
            $p->descripcion = $request->input('descripcion');
            $p->stock = $request->input('stock');
            $p->stock_critico = $request->input('stock_critico');
            $p->precio_compra = 0;
            $p->precio_venta = 0;
            $p->id_familia = 1;
            $p->id_tipo_producto = 1;
            $p->bloqueo = 0;
            $p->activo = 1;
            $p->save();
            return redirect()->route('producto.index')->with('success','Se ha creado correctamente.');
        } catch (\Throwable $th) {
            // return back()->with('danger','Error intente nuevamente');
            return $th;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Producto::where('id_producto',$id)->firstOrFail();
        return view('admin.producto.edit',compact('p'));
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
            $p = Producto::where('id_producto',$id)->firstOrFail();
            $p->nombre_producto = $request->input('nombre_producto');
            $p->descripcion = $request->input('descripcion');
            $p->stock = $request->input('stock');
            $p->stock_critico = $request->input('stock_critico');
            $p->update();
            return back()->with('success','Se ha actualizado correctamente');
        } catch (\Throwable $th) {
            // return back()->with('danger','Error intente nuevamente');
            return $th;
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
