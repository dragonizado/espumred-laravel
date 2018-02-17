<?php

namespace App\Modules\Pedidos\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Pedidos\Models\ListasPrecio;
use App\Models\Producto;

class PedidoController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$listasprecios = ListasPrecio::all();
		return view('pedidos::index', compact('listasprecios'));
	}

	public function create() {
		dd('Se ha ejecutado el formulario de pedidos');
	}

	public function calculo(Request $request){
		$cod = $request->codProd;
		$producto = Producto::find($cod); // se busca el producto en la bd
		$_descripcion = explode(' ',$producto->descripcion); //se separa el el tipo de articulo si es lam/e.con/col/mod etc  
		$data_form = $_descripcion[0]; // se saca el valor lam/e.con/col/mod etc

			// variables que vienen del formulario
			$valor_kilo = $request->valuekilo;
			$cantidad = $request->amount; 
            $por_descuento = $request->porcentageAmount;

            // se pregunta por el tipo de producto
			if($data_form == "LAM"){
				return response()->json($this->cal_form_espumas($producto,$valor_kilo,$cantidad,$por_descuento));
			}else{
				return response()->json([
					'mensaje'=>"El producto seleccionado no se puede procesar ya que no es un producto de espumas o lamina de espuma producto seleccionado = ". $producto->id ." el form data es = ".$data_form,
					'request'=>$request->codProd,
				]);
			}

			
	}

	protected function cal_form_espumas($producto,$valor_kilo,$cantidad,$por_descuento){
		$response = [];
		$densidad = str_replace(",", ".",$producto->densidad);
	    $ancho = str_replace(",", ".",$producto->ancho);
	    $largo =  str_replace(",", ".",$producto->largo);
	    $calibre = str_replace(",", ".",$producto->calibre);
	    if($densidad != null && $densidad != "0"){
	      if ($ancho != null && $ancho != "0") {
	        if ($largo != null && $largo != "0") {
	          if ($calibre != null && $calibre != "0") {
	            $valor_unitario = $this->calcularValor_unitario("LAM",$valor_kilo,$densidad,$ancho,$largo,$calibre);
	            $descuento = $this->calcularValor_descuento($valor_unitario,$cantidad,$por_descuento);
	            $valor_total_p = $this->calcularValor_total($valor_unitario,$cantidad,$descuento);
	            $response = [
	            	"status"=>"success",
	            	"mensaje"=>"ok",
		            "valor_unitario"=>$valor_unitario,
		            "valor_descuento"=>$descuento,
		            "valor_total"=>$valor_total_p,
	            ];
	          }else{
	          	$response = ['status'=>"error","mensaje"=>"El producto no tiene un calibre registrado."];
	          }
	        }else{
	          $response = ['status'=>"error","mensaje"=>"El producto no tiene un largo registrado."];
	        }
	      }else{
	        $response = ['status'=>"error","mensaje"=>"El producto no tiene un ancho registrado."];
	      }
	    }else{
	      $response = ['status'=>"error","mensaje"=>"El producto no tiene una densidad registrada."];
	    }
	    
		return $response;
	}

	protected function calcularValor_unitario($tipo,$vk,$den,$anc,$lar,$cal){
        // echo "econtinua valor_unitario = valor_kilo * densidad * ancho * calibre";
    	// echo "MOD valor_unitario = es ingresado por el asesor";
    	$valor_kilo = $vk;
		$valor_densidad = $den;
    	$valor_ancho = $anc;
    	$valor_largo = $lar;
    	$valor_calibre = $cal;
        switch ($tipo) {
        	case 'LAM':
        		$valor_total = $valor_kilo * $valor_densidad * $valor_ancho * $valor_largo * $valor_calibre;
          		return $valor_total;
        		break;
        	case 'E.CON':
        		$valor_total = $valor_kilo * $valor_densidad * $valor_ancho * $valor_calibre;
          		return $valor_total;
        		break;
        	default:
        		return false;
        		break;
        }


    }

    protected function calcularValor_descuento($vlunit,$can,$pordes){
		$valor_unitario = $vlunit;
		$valor_cantidad = $can;
		$valor_descuento = $pordes;
		$op1 = $valor_unitario * $valor_cantidad;
		$valor_total = $op1 * $valor_descuento / 100;
		return $valor_total;
    }

    protected function calcularValor_total($vu,$can,$des){
		$valor_unitario = $vu;
		$valor_cantidad = $can;
		$valor_descuento = $des;
		$valor_total = $valor_unitario * $valor_cantidad - $valor_descuento;
		return $valor_total;
    }

}
