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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id(); // ID principal (auto increment)
            $table->string('name', 250)->nullable(); // Nombre del estado
            $table->string('color', 250)->nullable(); // Color asociado al estado
            $table->integer('weight')->nullable(); // Peso para ordenamiento
            $table->integer('status_id')->default(1); // Estado lógico (activo/inactivo)
            $table->timestamps(); // created_at, updated_at (timestamps automáticos)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
};
