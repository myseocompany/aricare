<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            $table->dropForeign(['occupation_id']);
            $table->dropColumn('occupation_id');
            $table->string('occupation')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('occupation_id')->nullable();
            $table->foreign('occupation_id')->references('id')->on('lookups')->onDelete('set null');
            $table->dropColumn('occupation');
        });
    }
    
};
