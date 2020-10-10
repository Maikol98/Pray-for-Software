<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table ='comentarios';
    protected $primaryKey='id';
    public $timestamps=false;

    protected $fillable=[
        'titulo',
        'descripcion',
        'id_negocio',
        'id_persona'
    ];
}
