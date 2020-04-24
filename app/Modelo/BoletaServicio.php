<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Boleta_servicio extends Model
{
    protected $table = 'boleta_servicio';
    protected $primaryKey = 'id_boleta_servicio';

    public function cliente(){
        return $this->belongsTo(Ficha_cliente::class,'id_ficha_cliente');
    }
    public function odontologo(){
        return $this->belongsTo(Odontologo::class,'id_odontologo');
    }
    public function servicio(){
        return $this->belongsTo(Servicio::class,'id_servicio');
    }
}
