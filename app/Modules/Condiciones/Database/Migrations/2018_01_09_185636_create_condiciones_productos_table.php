<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondicionesProductosTable extends Migration {

  public function up() {
		Schema::create('condiciones_productos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('id_articulo')->unsigned();
			$table->integer('id_condicion')->unsigned();
			$table->string('referencia', 45);
			$table->string('precio_anterior', 45);
			$table->string('nuevo_precio', 45);
			$table->string('pie_factura', 10);
			$table->string('rebate', 10);
			$table->string('dos_sesenta', 3);
			$table->string('cinco_trenta', 3);
			$table->string('ocho_ocho', 3);
			$table->string('otro', 10);

			$table->foreign('id_articulo')->references('id')->on('articulos_condiciones');
			$table->foreign('id_condicion')->references('id')->on('condiciones');
		});
  }


  public function down() {
    Schema::dropIfExists('condiciones_productos');
  }
}
