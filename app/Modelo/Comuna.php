<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = 'comuna';
    protected $primaryKey = 'id_comuna';
    public $incrementing = false;
    public $timestamps = false;
    
    public function region(){
        return $this->belongsTo(Region::class,'id_region');
    }
    
}
