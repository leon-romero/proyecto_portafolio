<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class FichaProveedor extends Model
{
    protected $table = 'ficha_proveedor';
    protected $primaryKey = 'id_ficha_proveedor';

    public function comuna(){
        return $this->belongsTo(Comuna::class,'id_comuna');
    }
}
