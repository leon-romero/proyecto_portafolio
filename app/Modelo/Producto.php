<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;
// use App\Modelo\Familia;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';


    public function familia(){
        return $this->belongsTo(Familia::class,'id_familia');
    }
    public function tipo(){
        return $this->belongsTo(Tipo_producto::class,'id_tipo_producto');
    }
    
}
