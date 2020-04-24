<?php

namespace App\Modelo;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ficha_cliente extends Authenticatable
{
    use Notifiable;
 
    protected $table = 'ficha_cliente';
    protected $primaryKey = 'id_ficha_cliente';

    protected $guard = 'cliente';
    
    public function comuna(){
        return $this->belongsTo(Comuna::class,'id_comuna');
    }
}
