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
		$cod = 80001741;
		$form = "espumas";
		if($request->ajax){
			$producto = Producto::find($cod);
		}else{

			$producto = Producto::find($cod); // se busca el producto en la bd
			$_descripcion = explode(' ',$producto->descripcion); //se separa el el tipo de articulo si es lam/e.con/col/mod etc  
			$data_form = $_descripcion[0]; // se saca el valor lam/e.con/col/mod etc

			// variables que vienen del formulario
			$cantidad = 0; 
            $por_descuento = 0;

            // se pregunta por el tipo de producto
			if($data_form == "LAM"){
				dd($this->cal_form_espumas($producto));
			}else{
				dd("El producto seleccionado no se puede procesar ya que no es un producto de espumas o lamina de espuma producto seleccionado = ". $producto->id ." el form data es = ".$data_form);
			}
		}
	}

	protected function cal_form_espumas($producto){
		$_response = null;
		$densidad = str_replace(",", ".",$producto->densidad);
	    $ancho = str_replace(",", ".",$producto->ancho);
	    $largo =  str_replace(",", ".",$producto->largo);
	    $calibre = str_replace(",", ".",$producto->calibre);


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
