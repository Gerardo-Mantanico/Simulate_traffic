<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroTrafico extends Model
{
    protected $fillable =[
        'carril_id',
        'distancia',
        'tiempo_reaccion',
        'tiempo',
        'velocidad',
        'tipo_auto_id'
    ];
    
}
