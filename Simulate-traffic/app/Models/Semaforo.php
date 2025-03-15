<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Semaforo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tiempo_color_rojo',
        'tiempo_color_amarillo',
        'tiempo_color_verde',
        'tiempo_total',
    ];

}