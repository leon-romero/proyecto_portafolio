<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Orden_empleado extends Model
{
    protected $table = 'orden_empleado';
    protected $primaryKey = 'id_orden_empleado';

     
    public function empleado(){
        return $this->belongsTo(Empleado::class,'id_empleado');
    }
    public function empleado_r(){
        return $this->belongsTo(Empleado::class,'id_empleado_r');
    }
     
    public function proveedor(){
        return $this->belongsTo(Ficha_proveedor::class,'id_ficha_proveedor');
    }
    
}
