<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // Identificador único de la sede
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade'); // Relación con el equipo (clínica)
            $table->string('name'); // Nombre de la sede
            $table->string('address')->nullable(); // Dirección de la sede
            $table->string('phone')->nullable(); // Teléfono de contacto de la sede
            $table->string('email')->nullable(); // Correo electrónico de la sede
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
