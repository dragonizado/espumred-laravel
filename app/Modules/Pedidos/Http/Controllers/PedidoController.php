<?php

namespace App\Modules\Pedidos\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Pedidos\Models\ListasPrecio;

class PedidoController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$listasprecios = ListasPrecio::all();
		return view('pedidos::index', compact('listasprecios'));
	}

}
