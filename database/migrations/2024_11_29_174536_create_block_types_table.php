<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBlockTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_types', function (Blueprint $table) {
            $table->id(); // ID del tipo de bloqueo
            $table->string('name'); // Nombre del tipo de bloqueo (diario, semanal, mensual)
            $table->timestamps(); // created_at y updated_at
        });

        // Insertar tipos de bloqueo predeterminados
        DB::table('block_types')->insert([
            ['name' => 'Diario'],
            ['name' => 'Semanal'],
            ['name' => 'Mensual'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('block_types');
    }
}
