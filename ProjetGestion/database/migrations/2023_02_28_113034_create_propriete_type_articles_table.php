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
        Schema::create('propriete_type_articles', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->boolean("estObligatoire")->default(1);
            $table->foreignId("type_article_id")->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->unique(["nom", "type_article_id"]);
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
        Schema::table('propriete_type_articles', function (Blueprint $table) {
            $table->dropForeign("type_article_id");
        });
        Schema::dropIfExists('propriete_type_articles');
    }
};
