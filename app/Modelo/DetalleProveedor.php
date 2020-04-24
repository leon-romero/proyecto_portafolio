<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Detalle_proveedor extends Model
{
    protected $table = 'detalle_proveedor';
    protected $primaryKey = 'id_detalle_proveedor';

    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto');
    }

    public function proveedor(){
        return $this->belongsTo(Ficha_proveedor::class,'id_ficha_proveedor');
    }
}
