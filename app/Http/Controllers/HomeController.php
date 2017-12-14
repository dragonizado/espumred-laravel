<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Modulo;

class HomeController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}


	public function index() {
		$areas = Area::orderBy('nombre', 'desc')->get();
		return view('home')->with('areas', $areas);
	}

	public function show($id) {
		$modulos = Area::find($id)->modulos;
		return view('modulos')->with('modulos', $modulos);
	}

}
