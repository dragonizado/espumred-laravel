<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientController extends Controller {

	public function index() {
		$recipes = Cliente::orderBy('nombre_cliente')
			->get(['nombre_cliente', 'cod_cliente']);

		return response()
			->json([
				'recipes' => $recipes
			]);
	}

	public function search_name() {
		$results = Cliente::orderBy('nombre_cliente')
			->where('nombre_cliente', 'like', '%'.request('query').'%')
			->limit(6)
			->get();

		return response()->json($results);
	}

	public function search_cod() {
		$results = Cliente::orderBy('cod_cliente')
			->where('cod_cliente', 'like', '%'.request('query').'%')
			->limit(6)
			->get();

		return response()->json($results);
	}
}
