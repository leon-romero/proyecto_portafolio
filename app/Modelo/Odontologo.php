<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Odontologo extends Model
{
    protected $table = 'odontologo';
    protected $primaryKey = 'id_odontologo';

    public function nombre_completo(){
        return $this->nombres . " " . $this->apellidos;
    }
}
