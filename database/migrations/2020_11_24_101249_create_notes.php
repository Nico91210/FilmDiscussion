<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function($table)
        {
            $table->float('notes')->nullable();
        });
        Schema::table('film_series', function($table)
        {
            $table->float('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table)
        {
            $table->dropColumnIfExists('notes');
        });
        Schema::table('film_series', function($table)
        {
            $table->dropColumnIfExists('notes');
        });
    }
}
