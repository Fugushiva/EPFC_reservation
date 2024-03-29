<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Show;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 60);
            $table->string('designation', 60);
            $table->string('address', 255);
            $table->string('website', 255)->nullable();
            $table->string('phone', 30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shows', function(Blueprint $table){
            $table->dropForeign('shows_location_id_foreign');
        });
        Schema::dropIfExists('locations');
    }
};
