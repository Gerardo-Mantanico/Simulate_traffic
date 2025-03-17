<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vias extends Model
{
    protected $fillable = [
        'calle_id',
        'no_carriles',
        'direccion',
        'semaforo_id'
    ];
    public function semaforo(){
        return $this->hasMany(Semaforo::class);
    }
    public function carriles(){
        return $this->hasMany(Carriles::class);
    }
}
