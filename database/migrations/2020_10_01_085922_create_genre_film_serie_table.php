<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreFilmSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_film_serie', function (Blueprint $table) 
        {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('genre_id');
            $table->foreign("genre_id")->references('id')->on('genres');
            $table->unsignedBigInteger('film_serie_id');
            $table->foreign('film_serie_id')->references('id')->on('film_series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("genre_film_serie");
    }
}
