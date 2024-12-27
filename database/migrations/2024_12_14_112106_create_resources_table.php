<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->boolean('multi_patient')->default(false); // Si permite más de un paciente a la vez
            $table->timestamps();
        });


    }

    public function down()
    {


        Schema::dropIfExists('resources');
    }
}
