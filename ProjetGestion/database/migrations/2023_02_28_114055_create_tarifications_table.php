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
        Schema::create('tarifications', function (Blueprint $table) {
            $table->id();
            $table->double("prix");
            $table->foreignId("duree_location_id")->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId("article_id")->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();

            $table->unique(["duree_location_id", "article_id"]);
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
        Schema::table('tarifications', function(Blueprint $table){
            $table->dropForeign(["duree_location_id", "article_id"]);
        });
        Schema::dropIfExists('tarifications');
    }
};
