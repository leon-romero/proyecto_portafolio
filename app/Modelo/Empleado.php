<?php

namespace App\Modelo;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empleado extends Authenticatable
{
    use Notifiable;

    protected $table         = 'empleado';
    protected $primaryKey    = 'id_empleado';

    protected $guard         = 'empleado';
    // protected $fillable = ['rut_empleado','nombre_empleado','categoria','password'];
    
    //protected $hidden = ['password'];
    public function tipoEmpleado(){
        return $this->belongsTo(tipoEmpleado::class,'id_tipo_empleado');
    }
    public function nombre_completo(){
        return $this->nombres . " " . $this->apellidos;
    }
}
