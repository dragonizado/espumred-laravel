<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model {
	protected $fillable = [
		'nombre', 'estado', 'icono', 'area_id',
	];

	public function area(){
		return $this->belongsTo('App\Models\Area');
	}

}
