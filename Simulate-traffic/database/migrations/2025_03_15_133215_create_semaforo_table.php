<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('semaforos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('tiempo_color_rojo');
            $table->integer('tiempo_color_amarillo');
            $table->integer('tiempo_color_verde');
            $table->integer('tiempo_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semaforos');
    }
};
