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
        Schema::create('representations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('show_id')->constrained()->onUpdate('cascade');
            $table->dateTime('schedule');
            $table->foreignId('location_id')->constrained()->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('representations', function (Blueprint $table){
            $table->dropForeign('representations_show_id_foreign');
            $table->dropForeign('representations_location_id_foreign');
        });
        Schema::dropIfExists('representations');
    }
};
