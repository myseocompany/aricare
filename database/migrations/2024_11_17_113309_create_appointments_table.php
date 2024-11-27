<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_time'); // Hora de inicio de la cita
            $table->dateTime('end_time')->nullable(); // Hora de fin de la cita
            $table->string('patient'); // Nombre del paciente
            $table->string('reason')->nullable();; // Motivo de la consulta
            $table->string('description')->nullable(); // Descripción de la cita
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
