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
        Schema::create('representation_reservation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('representation_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('reservation_id')->nullable()->default(null)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('price_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('quantity')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representation_reservation');
    }
};
