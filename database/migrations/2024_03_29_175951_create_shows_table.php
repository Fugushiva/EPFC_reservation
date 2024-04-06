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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 60);
            $table->string('title', 60);
            $table->text('description');
            $table->string('poster_url', 255)->nullable();
            $table->boolean('bookable');
            $table->smallInteger('duration', false, true);
            $table->timestamp('created_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artist_type_show', function (Blueprint $table) {
            $table->dropForeign('artist_type_show_artist_type_id_foreign');
            $table->dropForeign('artist_type_show_show_id_foreign');
        });
        Schema::dropIfExists('shows');
    }
};
