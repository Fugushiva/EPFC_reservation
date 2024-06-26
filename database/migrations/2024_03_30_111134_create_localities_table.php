<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained()->onUpdate('cascade');
            $table->string('name', 200);
            $table->integer('postal_code');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function(Blueprint $table){
            $table->dropForeign('locations_locality_id_foreign');
        });
        Schema::dropIfExists('localities');
    }
};
