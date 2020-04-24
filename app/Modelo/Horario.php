<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'id_horario';
    public $incrementing = false;
    public $timestamps = false;
}
