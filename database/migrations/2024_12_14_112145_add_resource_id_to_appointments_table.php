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
        Schema::table('appointments', function (Blueprint $table) {
            // Ejemplo: Agregar un campo para el identificador del recurso asignado
            $table->foreignId('resource_id')->nullable()->constrained('resources')->cascadeOnDelete();

            // Otros campos que desees agregar o modificar
            // $table->string('status')->default('pending'); // Estado de la cita
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Eliminar las columnas añadidas
            $table->dropConstrainedForeignId('resource_id');

            // Otros campos que desees revertir
            // $table->dropColumn('status');
        });
    }
};
