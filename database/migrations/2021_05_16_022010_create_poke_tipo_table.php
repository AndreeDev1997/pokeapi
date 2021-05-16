<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokeTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poke_tipo', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('idPokemon')->unsigned();  
            $table->tinyInteger('idTipo')->unsigned();
            $table->foreign('idPokemon')->references('id')->on('pokemon'); 
            $table->foreign('idTipo')->references('id')->on('tipo');       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poke_tipo');
    }
}
