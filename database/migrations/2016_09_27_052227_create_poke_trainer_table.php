<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokeTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poke_trainer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poke_id')->unsigned();
            $table->foreign('poke_id')->references('id')->on('pokes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('trainer_id')->unsigned();
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poke_trainer');
    }
}
