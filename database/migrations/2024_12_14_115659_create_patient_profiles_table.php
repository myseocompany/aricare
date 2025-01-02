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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date('birth_date')->nullable(); // Fecha de nacimiento
            $table->string('gender')->nullable(); // Género
            $table->string('blood_type')->nullable(); // Tipo de sangre
            $table->string('phone')->nullable();
            $table->text('address')->nullable(); // Dirección
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_profiles');
    }
}
