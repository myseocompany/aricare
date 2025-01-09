<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamesToPatientProfiles extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            $table->string('first_name', 255)->nullable()->after('user_id');
            $table->string('middle_name', 255)->nullable()->after('first_name');
            $table->string('last_name', 255)->nullable()->after('middle_name');
            $table->string('second_last_name', 255)->nullable()->after('last_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_profiles', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'middle_name', 'last_name', 'second_last_name']);
        });
    }
}
