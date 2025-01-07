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
            $table->foreignId('patient_id')->nullable('users')->onDelete('cascade'); // Relación con paciente
            $table->foreignId('doctor_id')->nullable()->constrained('users')->onDelete('set null'); // Relación con doctor
            $table->foreignId('team_id')->nullable()->constrained('teams')->onDelete('cascade'); // Relación con equipo/clínica
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade'); // Relación con la sede de la clínica
            $table->string('reason')->nullable(); // Motivo de la consulta
            $table->string('description')->nullable(); // Descripción de la cita

            // Campos para bloquear una cita
            $table->foreignId('block_type_id')->nullable()->constrained('block_types')->onDelete('set null'); // Tipo de bloqueo
            $table->date('block_end_date')->nullable(); // Fecha de finalización del bloqueo


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
