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
        Schema::table('users', function (Blueprint $table) {
                  // Información personal adicional:
                    $table->string('last_name');  // Apellido
                    $table->string('dpi')->unique();  // DPI (Documento Personal de Identificación), único            
                    $table->date('birthdate')->nullable();  // Fecha de nacimiento
                    $table->enum('gender', ['male', 'female', 'other'])->nullable();  // Género (puede ser opcional)
                    $table->string('phone_number')->nullable();  // Número de teléfono
                    $table->text('address')->nullable();  // Dirección
                    $table->string('profile_picture')->nullable();  // Foto de perfil (puede almacenar la ruta o URL de la imagen)
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Información personal adicional:
                $table->string('last_name');  // Apellido
                $table->string('dpi')->unique();  // DPI (Documento Personal de Identificación), único            
                $table->date('birthdate')->nullable();  // Fecha de nacimiento
                $table->enum('gender', ['male', 'female', 'other'])->nullable();  // Género (puede ser opcional)
                $table->string('phone_number')->nullable();  // Número de teléfono
                $table->text('address')->nullable();  // Dirección
                $table->string('profile_picture')->nullable();  // Foto de perfil (puede almacenar la ruta o URL de la imagen)
 
        });
    }
};
