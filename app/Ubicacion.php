<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table ='ubicaciones';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable=[
        'longitud',
        'latitud',
        'descripcion',
        'id_negocio'
    ];
}
