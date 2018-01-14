/*********************
*     VARIABLES      *
*********************/

$.tipo_pedido = $("#tipo_pedido");
$.listas_precio = $("#listas_precio");
$.nombre_cliente = $("#nombre_cliente");
$.codigo_cliente = $("#codigo_cliente");
$.bonificacion = $("#bonificacion");
$.next_btn = $("#next_btn");

/*********************
*        INIT        *
*********************/

$(document).ready(function($){

	/* Deshabilitar inputs y select por defecto */
	disable('#pedidos_form input, #pedidos_form select, #next_btn', '#tipo_pedido');
	disable('#val_descuento, #val_unitario, #val_total');

});


/* Tipo pedido change evento */
$.tipo_pedido.change(function(){
	var tipo_pedido = $(this).val();
	$(".title_tipo_pedido").text($('option:selected',this).text()).removeClass("d-none");

	if(tipo_pedido == 2 || tipo_pedido == 3) {
		enable("#listas_precios");
	} else {
		disable("#listas_precios");
	}
	enable('#pedidos_form input, #pedidos_form select', '#listas_precios');
});


/* Mostrar | ocultar inputs de bonificaciones */
$.bonificacion.change(function(){
	if($(this).is(":checked")) {
		$("#bonificacion_container").removeClass("d-none");
	} else {
		$("#bonificacion_container").addClass("d-none");
	}
});


var bonificacion_html = `
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<input type="text" class="form-control" id="detalle_bonificacion">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<input type="text" class="form-control" id="referencia_bonificacion">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<input type="text" class="form-control" id="codigo_bonificacion">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="number" class="form-control" id="cantidad_bonificacion">
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group">
				<button class="btn btn-danger" id="remove_bonificacion">
					<i class="font-weight-bold icon-minus"></i>
				</button>
			</div>
		</div>
	</div>
`;

/* Añadir fila de bonificación */
$("#add_bonificacion").click(function(e){
	e.preventDefault();
	$('#bonificacion_container').append(bonificacion_html);
})


/* Eliminar fila de bonificación */
$('#bonificacion_container').on('click', '#remove_bonificacion', function(e) {
	e.preventDefault();
	$(this).parent().parent().parent().remove();
});


/* Autocomplete nombre cliente */
$($.nombre_cliente).autocompleter({
	source: '/clientes/search_name',
	customLabel: 'nombre_cliente',
	callback: function (value, index, data) {
		console.log(data);
		enable($.next_btn);
	}
});


/* Autocomplete código cliente */
$($.codigo_cliente).autocompleter({
	source: '/clientes/search_cod',
	customLabel: 'cod_cliente',
	callback: function (value, index, data) {
		console.log(data);
		enable($.next_btn);
	}
});


/*********************
*     UTILIDADES     *
*********************/

/* Desabilita un selector */
function disable(selectors, exclude = "") {
	$(selectors).not(exclude).prop('disabled', true);
}

/* Habilita un selector */
function enable(selectors, exclude = "") {
	$(selectors).not(exclude).prop('disabled', false);
}