<?php

namespace App\Modules\Condiciones\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Condiciones\Models\ArticulosCondicion;

class CondicionesProducto extends Model {

	public function articulosCondicion() {
		return $this->belongsTo(ArticulosCondicion::class);
	}
	
}
