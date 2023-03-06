<?php

use App\Models\DureeLocation;
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
        Schema::create('duree_locations', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->integer("valeurEnHeure");
        });

        $durees_location = [
            [
                "libelle" => "Semaine",
                "valeurEnHeure" => 168
            ],
            [
                "libelle" => "Journée",
                "valeurEnHeure" => 24
            ]
            ,
            [
                "libelle" => "Demi-Journée",
                "valeurEnHeure" => 12
            ]

        ];

        foreach ($durees_location as $duree_location){
            DureeLocation::create([
                "libelle" => $duree_location["libelle"],
                "valeurEnHeure" => $duree_location["valeurEnHeure"]
            ]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duree_locations');
    }
};
