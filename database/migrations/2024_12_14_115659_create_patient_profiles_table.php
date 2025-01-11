<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientProfilesTable extends Migration
{
    public function up(): void
    {
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // Relación con la tabla users
            $table->string('first_name')->nullable(); // Primer nombre
            $table->string('middle_name')->nullable(); // Segundo nombre
            $table->string('last_name')->nullable(); // Primer apellido
            $table->string('second_last_name')->nullable(); // Segundo apellido
            $table->unsignedBigInteger('document_type_id')->nullable(); // Relación con tipo de documento
            $table->string('document_id')->nullable(); // Número de documento
            $table->date('birth_date')->nullable(); // Fecha de nacimiento
            $table->unsignedBigInteger('gender_id')->nullable(); // Relación con género
            $table->unsignedBigInteger('blood_type_id')->nullable(); // Relación con tipo de sangre
            $table->string('phone')->nullable(); // Teléfono
            $table->text('address')->nullable(); // Dirección
            $table->unsignedBigInteger('civil_status_id')->nullable(); // Relación con estado civil
            $table->unsignedBigInteger('insurance_id')->nullable(); // Relación con EPS o aseguradora
            $table->unsignedBigInteger('risk_level_id')->nullable(); // Relación con nivel de riesgo
            $table->unsignedBigInteger('city_of_birth')->nullable(); // Relación con ciudad de nacimiento
            $table->string('nationality')->nullable(); // Nacionalidad
            $table->boolean('is_active')->default(true); // Estado activo/inactivo
            $table->string('occupation')->nullable(); // Ocupación (string)
            $table->timestamps();

            // Claves foráneas
            $table->foreign('document_type_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('gender_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('blood_type_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('civil_status_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('insurance_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('risk_level_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('city_of_birth')->references('id')->on('cities')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_profiles');
    }
}
