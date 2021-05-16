<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nombre', 35)->required();
            $table->string('descripcion', 20)->required();
            $table->string('peso', 20)->required();
            $table->char('altura', 2)->required();
            $table->char('generacion', 12)->required();
            $table->char('imagen', 9)->required();
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
        Schema::dropIfExists('pokemon');
    }
}
