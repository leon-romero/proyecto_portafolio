<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Detalle_documento extends Model
{
    protected $table = 'detalle_documento';
    protected $primaryKey = 'id_detalle_documento';

    public function documento(){
        return $this->belongsTo(Documento::class,'id_documento');
    }

    public function ver(){
        $public_path = public_path();
        $url = $public_path.'/storage/'.$this->ruta;
        return $url;
    }
}
