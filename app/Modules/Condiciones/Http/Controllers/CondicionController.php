<?php

namespace App\Modules\Condiciones\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\Condiciones\Models\Condicion;
use App\Modules\Condiciones\Models\CondicionesProducto;
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

			$articulos = DB::table('condiciones_productos as cp')
				->join('articulos_condiciones as ac', 'cp.id_articulo', '=','ac.id')
				->select('cp.nuevo_precio', 'ac.descripcion')
				->where('cp.id_condicion', $model->id)
				->get();

			return response()->json([
				'mensaje' => 'El cliente cuenta con una condición comercial vigente.',
				'id' => $model->id,
				'articulos' => $articulos,
				'action' => 'continuar'
			]);
		} else {
			return response()->json([
				'mensaje' => 'El cliente seleccionado no cuenta con una condición comercial vigente o actualizada.'.$request->codigo,
				'action' => 'error'
			]);
		}

	}

	public function error(){
		return view('error');
	}
}
