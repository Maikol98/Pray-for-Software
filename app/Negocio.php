<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    protected $table ='negocios';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'ubicacion',
        'descripcion',
        'buscasocio',
        'id_categoria',
        'id_persona',
    ];
}
