<?php

namespace App\Modules\Pedidos\Models;

use Illuminate\Database\Eloquent\Model;

class ListasPrecio extends Model {
	protected $fillable = ['descripcion'];
	public $timestamps = false;
}
