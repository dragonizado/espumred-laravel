<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductospedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productospedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto')->unsigned();
            $table->integer('id_pedido')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->integer('cantidad');
            $table->dateTime('fecha_creacion');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_usuario')->references('id')->on('users');
            $table->string('val_unitario',45);
            $table->string('val_kilo',45);
            $table->string('por_descuento',45);
            $table->string('val_total',45);
            $table->dateTime('fecha_entrega',300);
            $table->integer('nro_orden');
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
