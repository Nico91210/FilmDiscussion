<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string("libelle")->default("");
            $table->timestamps();
        });

        $roleAdmin = new Role();
        $roleAdmin->libelle = "Admin";
        $roleAdmin->save();

        $roleUser = new Role();
        $roleUser->libelle = "User";
        $roleUser->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
