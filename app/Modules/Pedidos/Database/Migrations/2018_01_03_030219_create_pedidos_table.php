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
        Schema::table('users', function (Blueprint $table) {
    		$table->increments('email');
    		$table->integer('email');
    		$table->string('email');
    		$table->dateTime('email');
    		$table->string('email');
    		$table->string('email');
    		$table->string('email');
    		$table->string('email');
    		$table->string('email');
    		$table->string('email');
    		$table->string('email');
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
