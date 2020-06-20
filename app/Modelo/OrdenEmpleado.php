<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class OrdenEmpleado extends Model
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
        return $this->belongsTo(FichaProveedor::class,'id_ficha_proveedor');
    }    
}
