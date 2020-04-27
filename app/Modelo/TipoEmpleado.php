<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    protected $table = 'tipo_empleado';
    protected $primaryKey = 'id_tipo_empleado';
    public $incrementing = false;
    // public $timestamps = false;
}
