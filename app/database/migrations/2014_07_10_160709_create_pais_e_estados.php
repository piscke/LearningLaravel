<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisEEstados extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('paises', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome');
            $table->integer('pontos');
            $table->timestamps();
        });

        Schema::create('estados', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nome');
            $table->integer('pais_id');
            $table->foreign('pais_id')->references('id')->on('paises');
            $table->timestamps();
        });
    }
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop("estados");
        Schema::drop("paises");
    }

}
