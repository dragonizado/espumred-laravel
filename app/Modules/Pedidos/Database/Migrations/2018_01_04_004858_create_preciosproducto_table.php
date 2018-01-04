<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preciosproductos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('precio',45);
            $table->integer('id_producto')->unsigned();
            $table->integer('id_lista_precios')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_lista_precios')->references('id')->on('listasprecios');
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
