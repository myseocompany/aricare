<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('lookups', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // Tipo de lookup, Ej.: "estado_civil", "ocupacion"
        $table->string('value'); // Valor del lookup, Ej.: "Soltero", "Ingeniero"
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('lookups');
}

};