<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users',function (Blueprint $table){
            //table->string('name',60)->change()
            $table->renameColumn('name', 'firstname');

            $table->string('lastname', 60)->after('name')->nullable();
            $table->string('login', 30)->after('id');
            $table->string('langue', 2);
            DB::statement('ALTER TABLE users MODIFY COLUMN `name` VARCHAR(60)');
            $table->unique('login', 'users_login_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropUnique('users_login_unique');

            $table->dropColumn(['langue', 'login', 'lastname']);
            $table->string('firstname', 255)->change();
            $table->renameColumn('firstname', 'name');
        });
    }
};
