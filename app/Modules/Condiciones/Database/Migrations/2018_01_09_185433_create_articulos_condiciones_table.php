<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosCondicionesTable extends Migration
{

  public function up() {
    Schema::create('articulos_condiciones', function (Blueprint $table) {
			$table->increments('id');
			$table->string('descripcion');
		});
  }


  public function down() {
    Schema::dropIfExists('articulos_condiciones');
  }
}
