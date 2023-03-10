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
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId("role_id")->constrained()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign("user_id");
            $table->dropForeign("role_id");
        });

        Schema::dropIfExists('role_user');
    }
};
