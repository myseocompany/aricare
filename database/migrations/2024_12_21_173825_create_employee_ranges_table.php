<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('range', 50)->unique(); // Rango de empleados (1-3, 3-6, etc.)
            $table->timestamps();
        });

        // Modificar la tabla company_profiles
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_range_id')->nullable()->after('company_type_id');
            $table->foreign('employee_range_id')->references('id')->on('employee_ranges')->onDelete('set null');
            $table->dropColumn('employee_number'); // Elimina el campo actual
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('employee_number', 20)->nullable();
            $table->dropForeign(['employee_range_id']);
            $table->dropColumn('employee_range_id');
        });

        Schema::dropIfExists('employee_ranges');
    }
};
