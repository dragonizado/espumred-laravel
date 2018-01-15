<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;
use App\Models\Bloque;

class HomeController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$modulos = Modulo::orderBy('nombre', 'desc')->get();
		return view('home')->with('modulos', $modulos);
	}

	public function show($id) {
		$bloques = Modulo::find($id)->bloques;
		return view('bloques')->with('bloques', $bloques);
	}

}
