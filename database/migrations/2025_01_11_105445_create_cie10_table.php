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
        Schema::create('cie10', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('name', 300)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cie10');
    }
};
