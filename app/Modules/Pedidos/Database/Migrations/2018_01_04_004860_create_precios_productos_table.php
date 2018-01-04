<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('precio',45);
            $table->integer('id_producto')->unsigned();
            $table->integer('id_listas_precios')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_listas_precios')->references('id')->on('listas_precios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
