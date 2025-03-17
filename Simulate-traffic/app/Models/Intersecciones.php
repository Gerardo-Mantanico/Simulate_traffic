<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intersecciones extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function calles(){
        return this->hasMany(Calles::class);
    }
}

