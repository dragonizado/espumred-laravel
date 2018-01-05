<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model {

	protected $fillable = [
		'nombre', 'estado', 'icono',
	];

	public function bloques() {
		return $this->hasMany('App\Models\Bloque');
	}

}
