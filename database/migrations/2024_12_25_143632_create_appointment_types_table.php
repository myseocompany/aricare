<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTypesTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del tipo de cita
            $table->text('description')->nullable(); // Descripción opcional
            $table->text('color')->nullable(); // Color para mostrar en el calendario
            
            $table->timestamps();
        });

        // Agregar relación con la tabla de citas
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('type_id')->nullable()->constrained('appointment_types')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropColumn('type_id');
        });
        Schema::dropIfExists('appointment_types');
    }
}
