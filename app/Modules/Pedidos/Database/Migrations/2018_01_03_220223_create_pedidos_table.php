<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
    		$table->increments('id');
            $table->integer('cod_cliente')->unsigned();
    		$table->foreign('cod_cliente')->references('cod_cliente')->on('clientes');
    		$table->string('obs_entrega');
    		$table->dateTime('fecha_creacion');
            $table->integer('user_id')->unsigned();
    		$table->foreign('user_id')->references('id')->on('users');
    		$table->string('estado_correo',45);
    		$table->string('estado_pedido',45);
    		$table->string('codigo_sap',45);
    		$table->string('codigo_sap_boni',45);
    		$table->string('cartera_descripcion',300);
    		$table->string('pedido_descripcion',300);
    		$table->string('valor_total_pedido',45);
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
