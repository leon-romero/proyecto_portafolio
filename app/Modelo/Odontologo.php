<?php

namespace App\Modelo;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Odontologo extends Authenticatable
{
    use Notifiable;

    protected $table = 'odontologo';
    protected $primaryKey = 'id_odontologo';
    protected $guard = 'odontologo';

    public function nombre_completo(){
        return $this->nombres . " " . $this->apellidos;
    }
}
