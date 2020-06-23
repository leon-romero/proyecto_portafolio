<?php

namespace App\Http\Controllers;
use DB;
use App\Modelo\FichaCliente;

class ProcedimientosController extends Controller
{

    //     $model = new App\Modelo\FichaCliente();
    //     $cliente = $model->hydrate(
    //         DB::select("call proce_read_cliente($id)")
    //     );


    public function proceBuscarClientes(){
        // proce_buscar_clientes
        $clientes = DB::select(
            'call proce_buscar_clientes()'
        );
        return $clientes;
    }

    public function proceBuscarCliente($id){
        // return $id;
        // proce_buscar_cliente
        try {
            $model = new FichaCliente();
            $cliente = $model->hydrate(
                DB::select("call proce_buscar_cliente($id)")
            );
            return $cliente[0]->nombre_completo();
        } catch (\Throwable $th) {
            return $th;
        }
    }
    
    public function proceBoletaServicios(){
        // proce_boleta_servicios
        $boletas = DB::select(
            'call proce_boleta_servicios()'
        );
        return $boletas;
    }

    public function proceFichaProveedores(){
        // proce_ficha_proveedores
        $proveedores = DB::select(
            'call proce_ficha_proveedores()'
        );
        return $proveedores;
    }

    public function proceOdontologos(){
        // proce_odontologos
        $odontologos = DB::select(
            'call proce_odontologos()'
        );
        return $odontologos;
    }

    public function proceDocumentos(){
        // proce_documentos
        $documentos = DB::select(
            'call proce_documentos()'
        );
        return $documentos;
    }

    
    public function proceProductosProveedor($id){
        // proce_productos_proveedor
        $productos = DB::select(
            "call proce_productos_proveedor($id)"
        );
        return $productos;
    }

        
    public function proceHorarioTomadas($date){
        // proce_horario_tomadas
        $horario = DB::select(
            "call proce_horario_tomadas($date)"
        );
        return $horario;
    }
}
