<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carriles extends Model
{
    protected $fillable = [
        'id',
        'via_id',
        'ancho',
        'señalizado',
        'condiciones_id',
    ];
    public function registros_trafico(){
     return $this->hasMany(RegistroTrafico::class);
    }
}
