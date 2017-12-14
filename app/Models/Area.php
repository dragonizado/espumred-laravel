<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

	protected $fillable = [
		'nombre', 'estado', 'icono',
	];

	public function modulos() {
		return $this->hasMany('App\Models\Modulo');
	}

}
