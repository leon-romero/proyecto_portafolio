<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Detalle_orden extends Model
{
    protected $table = 'detalle_orden';
    protected $primaryKey = 'id_detalle_orden';

    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto');
    }
    
}
