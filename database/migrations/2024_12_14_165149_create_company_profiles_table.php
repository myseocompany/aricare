<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id(); // ID único
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla users
            $table->string('company_type', 50); // Tipo de empresa
            $table->string('company_name', 255); // Nombre de la empresa
            $table->string('employee_number', 20)->nullable(); // Número de empleados
            $table->string('phone', 15)->nullable(); // Teléfono
            $table->foreignId('country_id')->constrained('countries')->onDelete('restrict'); // País
            $table->foreignId('division_id')->nullable()->constrained('divisions')->onDelete('restrict'); // División
            $table->foreignId('city_id')->nullable()->constrained('cities')->onDelete('restrict'); // Ciudad
            $table->text('address')->nullable(); // Dirección completa
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
        Schema::dropIfExists('company_profiles');
    }
}
