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
       
    Schema::create('tipo_conductores', function (Blueprint $table) {
        $table->string('nombre');
        $table->timestamps();
    });

Schema::create('tipo_vehiculos', function (Blueprint $table) {
        $table->string('tipo_vehiculo');
        $table->timestamps();
    });
 
    Schema::create('vehiculos', function (Blueprint $table) {
        $table->string('marca');
        $table->string('modelo');
        $table->date('fecha');
        $table->timestamps();
        $table->foreign('tipo_vehiculos')
            ->references('id')
            ->on('tipo_vehiculos');
    });

Schema::create('tipo_autos', function (Blueprint $table) {
        $table->enum('gender', ['male', 'female', 'other'])->nullable(); 
        $table->timestamps();
        //llaves foraneas
        $table->foreign('vehiculo_id')
        ->references('id') 
        ->on('vehiculo') 
        ->onDelete('cascade'); 
        $table->foreign('tipo_conductor_id')
        ->references('id')
        ->on('tipo_conductores');
    });
      
    
  // Crear tabla 'intersecciones'
  Schema::create('intersecciones', function (Blueprint $table) {
    $table->string('nombre');
    $table->timestamps();
});

// Crear tabla 'calles'
Schema::create('calles', function (Blueprint $table) {git
    $table->string('nombre');
    $table->decimal('largo', 10, 2);
    $table->timestamps();
    // Definir la columna 'interseccion_id' para la clave foránea
    $table->unsignedBigInteger('interseccion_id'); 
    $table->foreign('interseccion_id')
        ->references('id')
        ->on('intersecciones');

        //falta la relacion cardinalidad
});

// Crear tabla 'puntos_cardinales'
Schema::create('puntos_cardinales', function (Blueprint $table) {
    $table->id(); // Ya es primary key por defecto
    $table->string('nombre');
    $table->timestamps();
});

// Crear tabla 'vias'
Schema::create('vias', function (Blueprint $table) {
    $table->id(); // Ya es primary key por defecto    
    //eliminar esto nombre
    $table->string('nombre');
    $table->decimal('largo', 10, 2); // Tamaño adecuado para el campo 'largo'
    $table->timestamps();
    // Definir las columnas necesarias antes de agregar las claves foráneas
    $table->unsignedBigInteger('interseccion_id'); 
    $table->unsignedBigInteger('tipo_vehiculo_id');
    $table->foreign('interseccion_id')
        ->references('id')
        ->on('intersecciones');
    $table->foreign('tipo_vehiculo_id')
        ->references('id')
        ->on('tipo_vehiculos'); // Nombre correcto de la tabla de referencia
});

// Crear tabla 'condiciones_carriles'
Schema::create('condiciones_carriles', function (Blueprint $table) {
    $table->id(); // Ya es primary key por defecto
    $table->string('description');
    $table->timestamps();
});

// Crear tabla 'carriles'
Schema::create('carriles', function (Blueprint $table) {
    $table->id(); // Ya es primary key por defecto
    $table->decimal('ancho', 10, 2); // Tamaño adecuado para el campo 'ancho'
    $table->string('nombre');
    $table->boolean('señalizado');
    $table->timestamps();
    // Definir las columnas necesarias antes de agregar las claves foráneas
    $table->unsignedBigInteger('via_id'); 
    $table->unsignedBigInteger('condiciones_id');
    $table->foreign('via_id')
        ->references('id')
        ->on('vias');
    $table->foreign('condiciones_id')
        ->references('id')
        ->on('condiciones_carriles');
});
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schemas');
    }
};
