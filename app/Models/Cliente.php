<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
	protected $table = "clientes";

	protected $fillable = [
		'cod_cliente', 'nombre_cliente'
	];

	public $timestamps = false;
}
