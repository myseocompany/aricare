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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('name', 250)->nullable(); // Nombre de la categoría
            $table->unsignedBigInteger('parent_id')->nullable(); // Relación con la categoría padre
            $table->integer('weight')->nullable(); // Peso para ordenamiento
            $table->text('description')->nullable(); // Descripción de la categoría
            $table->timestamp('delivery_date')->nullable(); // Fecha de entrega
            $table->integer('promoted')->nullable(); // Promoción
            $table->timestamps(); // created_at, updated_at

            // Clave foránea para parent_id
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
