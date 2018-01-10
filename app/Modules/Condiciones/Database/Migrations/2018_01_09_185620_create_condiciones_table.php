<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondicionesTable extends Migration {

  public function up() {
    Schema::create('condiciones', function (Blueprint $table) {
			$table->increments('id');
			$table->string('tipologia_cliente', 10);
			$table->string('cambio', 10);
			$table->string('neg_puntual', 10);
			$table->date('vigenciadesde');
			$table->date('vigenciahasta');
			$table->string('ger_cartera', 60);
			$table->string('ger_comercial', 60);
			$table->string('ger_general', 60);
			$table->date('fecha_aut_cartera');
			$table->date('fecha_aut_comercial');
			$table->date('fecha_aut_general');
			$table->text('observaciones');
			$table->dateTime('fecha_registro');
			$table->string('descuento_dias', 6);
			$table->string('estado', 60);

			$table->integer('cod_cliente')->unsigned();
			$table->integer('id_asesor')->unsigned();

			$table->foreign('cod_cliente')->references('cod_cliente')->on('clientes');
			$table->foreign('id_asesor')->references('id')->on('users');
		});
  }


  public function down() {
    Schema::dropIfExists('condiciones');
  }
}
