<?php

namespace App\Modules\Condiciones\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Condiciones\Models\Condicion;
use Illuminate\Support\Facades\Auth;

class CondicionController extends Controller {

	public function index(){
		return view('condiciones::index');
	}

	public function validateCondicion(Request $request){

		$model = Condicion::where('cod_cliente', $request->codigo)
			->where('id_asesor', Auth::id())
			->where('estado', 'Vigente')
			->orderBy('fecha_registro', 'desc')
			->first();

		if($model) {
			return response()->json([
				'mensaje' => 'El usuario cuenta con una condición comercial vigente.',
				'id' => $model->id,
				'action' => 'continuar'
			]);
		} else {
			return response()->json([
				'mensaje' => 'El cliente seleccionado no cuenta con una condición comercial vigente o actualizada.',
				'action' => 'error'
			]);
		}

	}

	public function error(){
		return view('error');
	}
}
