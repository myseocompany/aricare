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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->unsignedBigInteger('project_id')->nullable(); // Relación con un proyecto
            $table->string('name', 250)->nullable(); // Nombre del producto
            $table->string('reference', 250)->nullable(); // Referencia del producto
            $table->integer('price')->nullable(); // Precio del producto
            $table->integer('quantity')->nullable(); // Cantidad disponible
            $table->unsignedBigInteger('category_id')->nullable(); // Relación con categoría
            $table->string('category_code', 10)->nullable(); // Código de categoría
            $table->unsignedBigInteger('type_id')->nullable(); // Relación con el tipo de producto
            $table->unsignedBigInteger('status_id')->nullable(); // Relación con estado del producto
            $table->string('location', 250)->nullable(); // Ubicación del producto
            $table->text('notes')->nullable(); // Notas adicionales
            $table->string('image_url', 250)->nullable(); // URL de la imagen del producto
            $table->timestamps(); // created_at, updated_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
