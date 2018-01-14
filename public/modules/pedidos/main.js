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
	hide("#valor_kilo_row");

});


/* Tipo pedido change evento */
$.tipo_pedido.change(function(){
	var tipo_pedido = $(this).val();
	$(".title_tipo_pedido").text($('option:selected',this).text()).removeClass("d-none");
	
	switch(tipo_pedido) {
		case '1': //Espumas
			toggleState('#pedidos_form input', '#listas_precios');
			show("#valor_kilo_row");
		break; 
		case '2': //Colchones
			enable("#listas_precios");
			hide("#valor_kilo_row");
		break; 
		case '3': //Muebles
			enable("#listas_precios, #val_unitario");
			hide("#valor_kilo_row");
		break; 
		case '4': //Módulos
			toggleState('#pedidos_form input, #val_unitario', '#listas_precios');
			hide("#valor_kilo_row");
		break; 
		case '5': //Segundas
			toggleState('#pedidos_form input', '#listas_precios');
			hide("#valor_kilo_row, #val_unitario_row");
		break; 
		case '6': //Otros
			toggleState('#pedidos_form input, #val_descuento, #val_unitario, #val_total', '#listas_precios');
			hide("#valor_kilo_row");
		break; 
	}


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
		$.codigo_cliente.val(data.cod_cliente);
		enable($.next_btn);
	}
});


/* Autocomplete código cliente */
$($.codigo_cliente).autocompleter({
	source: '/clientes/search_cod',
	customLabel: 'cod_cliente',
	callback: function (value, index, data) {
		console.log(data);
		$.nombre_cliente.val(data.nombre_cliente);
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

function toggleState(enabled, disabled) {
	$(enabled).prop('disabled', false);
	$(disabled).prop('disabled', true);
}

function show(selector) {
	$(selector).removeClass('d-none');
}

function hide(seelctor) {
	$(selector).addClass('d-none');
}