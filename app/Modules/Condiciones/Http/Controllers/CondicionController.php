<?php

namespace App\Modules\Condiciones\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Condiciones\Models\Condicion;
use Illuminate\Support\Facades\Auth;

class CondicionController extends Controller
{
    public function index(){
    	return view('condiciones::index');
    }

    public function validatecc(){
    	$cod = $_GET['cod'];
    	$user_id = Auth::id();
    	$model = Condicion::where('cod_cliente',$cod)
    					->where('id_asesor',$user_id)
    					->where('estado','Vigente')
    					->orderBy('fecha_registro','desc')
    					->get();
    	$response = [];
    	if($model->isnotEmpty()){
    		$response["mensaje"] = "El usuario cuenta con una condicion comercial vigente";
		    $response["id"] = $model[0]['id'];
		    $response["action"] = "continuar";
    	}else{
    		$response["mensaje"] = "El cliente seleccionado no cuenta con una condicion comercial vigente o actualizada";
      		$response["action"] = "error";
    	}
    	echo json_encode($response);
    }

    public function error(){
    	return view('error');
    }
}
