<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('estado');
            $table->string('icono');
            $table->integer('modulo_id')->unsigned();
            $table->foreign('modulo_id')->references('id')->on('areas')->onDelete('cascade');
            $table->index('modulo_id');
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
        Schema::dropIfExists('modulos');
    }
}
