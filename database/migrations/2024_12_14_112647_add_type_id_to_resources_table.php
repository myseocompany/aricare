<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeIdToResourcesTable extends Migration
{
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->foreignId('type_id')->after('branch_id')->constrained('resource_types')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropConstrainedForeignId('type_id');
        });
    }
}
