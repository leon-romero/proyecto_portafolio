<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';
    protected $primaryKey = 'id_region';
    public $incrementing = false;
    public $timestamps = false;
}
