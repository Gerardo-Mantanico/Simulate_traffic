<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iteracion extends Model
{
    protected $fillable = [
        'users_id',
        'hora_inicial',
        'hora_final',
        'interseccion_id',
        'simulacion_id',
        'comentario',
    ];
}
