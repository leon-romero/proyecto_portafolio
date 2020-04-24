<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Detalle_servicio extends Model
{
    protected $table = 'detalle_servicio';
    protected $primaryKey = 'id_detalle_servicio';

    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto');
    }
    public function servicio(){
        return $this->belongsTo(Servicio::class,'id_servicio');
    }
  
}
