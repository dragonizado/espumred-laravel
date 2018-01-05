<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloque extends Model {
	protected $fillable = [
		'nombre', 'estado', 'icono', 'modulo_id',
	];

	public function area(){
		return $this->belongsTo('App\Models\Modulo');
	}

}
