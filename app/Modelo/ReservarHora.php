<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Reservar_hora extends Model
{
    protected $table = 'reservar_hora';
    protected $primaryKey = 'id_reservar_hora';

    public function centro(){
        return $this->belongsTo(Centro::class,'id_centro');
    }
    public function horario(){
        return $this->belongsTo(Horario::class,'id_horario');
    }
    public function servicio(){
        return $this->belongsTo(Servicio::class,'id_servicio');
    }
    public function cliente(){
        return $this->belongsTo(Ficha_cliente::class,'id_ficha_cliente');
    }

    public function odontologo(){
        return $this->belongsTo(Odontologo::class,'id_odontologo');
    }
    
}
