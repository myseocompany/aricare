<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            // Eliminar el campo antiguo 'company_type'
            $table->dropColumn('company_type');
            
            // Agregar la nueva relación con la tabla company_types
            $table->foreignId('company_type_id')
                ->nullable()
                ->after('user_id')
                ->constrained('company_types')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            // Restaurar el campo original 'company_type'
            $table->string('company_type', 50)->after('user_id');
            
            // Eliminar la relación agregada
            $table->dropForeign(['company_type_id']);
            $table->dropColumn('company_type_id');
        });
    }
};
