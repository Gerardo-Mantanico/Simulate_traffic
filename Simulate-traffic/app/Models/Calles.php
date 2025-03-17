<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calles extends Model
{
    protected $fillable =[
        'interseccion_id',
        'nombre',
        'largo',
        'cardinalidad_id',
    ];
    public function vias(){
        return this->hasMay(Vias::class);
    }
}
