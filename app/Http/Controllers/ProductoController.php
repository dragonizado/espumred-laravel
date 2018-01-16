<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function search_cod() {
		$results = Producto::orderBy('id')
			->where('id', 'like', '%'.request('query').'%')
			->limit(6)
			->get();

		return response()->json($results);
	}

	public function search_desc() {
		$results = Producto::orderBy('id')
			->where('descripcion', 'like', '%'.request('query').'%')
			->limit(6)
			->get();

		return response()->json($results);
	}
}
