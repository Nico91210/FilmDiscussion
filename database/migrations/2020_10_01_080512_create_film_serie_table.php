<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_series', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('titre');
            $table->date('date_sortie')->nullable();
            $table->enum('type', ['film', 'serie'])->default("film");
            $table->integer('nombreEpisode')->nullable()->default(0);
            $table->integer('duree')->nullable()->default(0);
            $table->text('resume')->nullable();
            $table->string('production')->nullable()->default("");
            $table->string('affiche')->nullable()->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_serie');
    }
}
