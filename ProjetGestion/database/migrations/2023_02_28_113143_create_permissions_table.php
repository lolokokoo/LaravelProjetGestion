<?php

use App\Models\Permission;
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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
        });



        $permissions = [
            "ajouter un client",
            "consulter un client",
            "editer un client",
            "ajouter une location",
            "consulter une location",
            "editer une location",
            "ajouter un article",
            "consulter un article",
            "editer un article",
        ];
        foreach ($permissions as $permission){
            Permission::create(['nom' => $permission]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
