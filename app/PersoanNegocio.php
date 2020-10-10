<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersoanNegocio extends Model
{
    protected $table ='personanegocio';
    protected $primaryKey='id_persona';
    public $timestamps=false;

    protected $fillable=[
        'id_persona',
        'id_negocio'
    ];
}
