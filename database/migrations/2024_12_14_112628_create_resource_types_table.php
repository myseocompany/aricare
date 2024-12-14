<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceTypesTable extends Migration
{
    public function up()
    {
        Schema::create('resource_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // E.g., "Consultorio", "Unidad Odontológica"
            $table->text('description')->nullable();
            $table->timestamps();
        });


    }

    public function down()
    {


        Schema::dropIfExists('resource_types');
    }
}
