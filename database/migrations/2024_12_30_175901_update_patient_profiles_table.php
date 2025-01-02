<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            // Agregar claves foráneas a la tabla lookups
            $table->unsignedBigInteger('civil_status_id')->nullable()->after('address'); // Referencia a estado civil
            $table->unsignedBigInteger('occupation_id')->nullable()->after('civil_status_id'); // Referencia a ocupación
            $table->unsignedBigInteger('insurance_id')->nullable()->after('occupation_id'); // Referencia a EPS o aseguradora
            $table->unsignedBigInteger('risk_level_id')->nullable()->after('insurance_id'); // Clasificación de riesgo
    
            // Claves foráneas
            $table->foreign('civil_status_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('occupation_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('insurance_id')->references('id')->on('lookups')->onDelete('set null');
            $table->foreign('risk_level_id')->references('id')->on('lookups')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            // Eliminar claves foráneas
            $table->dropForeign(['civil_status_id']);
            $table->dropForeign(['occupation_id']);
            $table->dropForeign(['insurance_id']);
            $table->dropForeign(['risk_level_id']);
    
            // Eliminar columnas
            $table->dropColumn(['civil_status_id', 'occupation_id', 'insurance_id', 'risk_level_id']);
        });
    }
};
