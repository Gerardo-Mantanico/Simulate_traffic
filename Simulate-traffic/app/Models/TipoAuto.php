<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAuto extends Model
{
    protected $fillable=[
        'vehiculo_id',
        'tipo_conductor_id',
        'genero_id'
    ];
}
