<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            $table->string('nationality')->nullable();
            $table->boolean('is_active')->default(true); // 1 = Activo, 0 = Inactivo
        });
    }
    
    public function down()
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            $table->dropColumn(['nationality', 'is_active']);
        });
    }
    
};
