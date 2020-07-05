<?php

namespace App\Http\Controllers;

use App\Modelo\Empleado;
use App\Modelo\Producto;
use App\Modelo\FichaProveedor;
use App\Modelo\OrdenEmpleado;
use App\Modelo\DetalleProveedor;
use App\Modelo\DetalleOrden;


use Illuminate\Http\Request;

class MonitoreoController extends Controller
{
    public function index()
    {
        $productos = Producto::get();
        return view('admin.monitoreo.index',compact('productos'));
    }

    public function solicitudes(){
        $solicitudes = OrdenEmpleado::get();
        return view('admin.solicitud.index',compact('solicitudes'));
    }

    public function proveedores(){
        try {
            $proveedores = FichaProveedor::get();
            $detalles = DetalleProveedor::get();
            return view('admin.solicitud.proveedores.index',compact('proveedores','detalles'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function create($id){
        try{
            $prov = FichaProveedor::where('id_ficha_proveedor',$id)->firstOrFail();
            $detalles = DetalleProveedor::where('id_ficha_proveedor',$id)->get();
            return view('admin.solicitud.proveedores.create',compact('prov','detalles'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    // recepcion del producto 
    public function show($codigo){
        try{
            $orden = OrdenEmpleado::where('codigo',$codigo)->firstOrFail();
            $detalles = DetalleOrden::where('id_orden_empleado',$orden->id_orden_empleado)->get();

            // return $detalles;
            if($orden->enviado == 1){
                return view('admin.solicitud.recibir.index',compact('orden','detalles'));
            }else{
                return view('admin.solicitud.recibir.show',compact('orden','detalles'));
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }


    public function update($codigo, Request $request){
        // return $request;
        try {
            $orden = OrdenEmpleado::where('codigo',$codigo)->first();
            $listado = $request->input('id_producto');

            foreach ($listado as $l) {
                $n = "cantidad" . $l;
                $cantidad = $request->input($n);

                $detalle = DetalleOrden::where('id_orden_empleado',$orden->id_orden_empleado)->where('id_detalle_orden',$l)->first();
                // $detalle->id_orden_empleado = $orden->id_orden_empleado;
                // $detalle->id_producto = (int)$l;
                // $detalle->cantidad = (int)$cantidad;
                $orden->id_empleado_r = auth('empleado')->user()->id_empleado;
                $orden->enviado = 2;
                $orden->update();
                if($cantidad>0){
                    $detalle->cantidad_recibida = $cantidad;
                    $detalle->entregado = 1;
                    $detalle->producto->stock += $cantidad;
                    $detalle->producto->update(); 
                }else{
                    $detalle->entregado = 0;
                }
                $detalle->update();            
        
        
            }
            // return "genial";
            return back()->with('success','Recibido'); 

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function store($id_proveedor, Request $request){
        try {
            // return $request;
            if(strlen($request->input('id_producto')>0)){
                $orden = new OrdenEmpleado();
                $orden->id_empleado = auth('empleado')->user()->id_empleado;
                $orden->codigo = $this->code();

                $orden->id_ficha_proveedor = $id_proveedor;
                $orden->enviado = 1;
                $orden->save();
    
                $listado = $request->input('id_producto');

                $estado = false;

                foreach ($listado as $l) {
                    $n = "cantidad" . $l;
                    $cantidad = $request->input($n);
                    
                    if($cantidad>0){
                        $detalle = new DetalleOrden();
                        $detalle->id_orden_empleado = $orden->id_orden_empleado;
                        $detalle->id_producto = (int)$l;
                        $detalle->cantidad = (int)$cantidad;
                        $detalle->cantidad_recibida = 0;
                        $detalle->entregado = 0;
                        $detalle->save();
                        $estado = true; 
                    }
                }
                if ($estado) {
                    return back()->with('success','Se ha generado la orden código ' . $orden->codigo . "."); 
                }else{
                    $orden->delete();
                    return back()->with('info','Error agrege productos.'); 
                }
            }else{
                return back()->with('info','Error intente nuevamente.'); 
            }
        } catch (\Throwable $th) {
            return back()->with('info','Error intente nuevamente.'); 
        }
    }

    
    private function code(){
        $code = $this->generarCodigo(8);
        try {    
            $o = OrdenEmpleado::where('codigo',$code)->firstOrFail();
            code();
        } catch (\Throwable $th) {
            return $code;
        }        
    }

    private function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }
}
