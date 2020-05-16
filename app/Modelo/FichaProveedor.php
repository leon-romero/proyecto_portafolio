<?php

namespace App\Modelo;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class FichaProveedor extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'ficha_proveedor';
    protected $primaryKey = 'id_ficha_proveedor';
    protected $guard = 'proveedor';

    public function comuna(){
        return $this->belongsTo(Comuna::class,'id_comuna');
    }
}
