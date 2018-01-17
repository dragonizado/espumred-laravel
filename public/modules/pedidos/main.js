/*********************
*     VARIABLES      *
*********************/

$.tipo_pedido = $("#tipo_pedido");
$.listas_precio = $("#listas_precio");
$.nombre_cliente = $("#nombre_cliente");
$.codigo_cliente = $("#codigo_cliente");
$.codigo_producto = $("#cod_producto");
$.descripcion_producto = $("#desc_producto");
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
	$(".title_tipo_pedido").text($('option:selected',this).text()).removeClass("d-none");

	if($.codigo_cliente.val() && $.tipo_pedido.val() == '1') {
		validateCC($.codigo_cliente.val());
	} else {
		removeInputError("#codigo_cliente, #nombre_cliente");
		enable($.next_btn);
	}

	switch($.tipo_pedido.val()) {
		case '1': //Espumas
			enable('#pedidos_form input');
			disable('#listas_precios, #val_descuento, #val_unitario, #val_total');
			show("#valor_kilo_row, #valor_unitario_row");
		break; 
		case '2': //Colchones
			enable('#pedidos_form input, #listas_precios');
			disable('#val_descuento, #val_unitario, #val_total');
			show('#valor_unitario_row');
			hide("#valor_kilo_row");
		break; 
		case '3': //Muebles
			enable("#pedidos_form input, #listas_precios, #val_unitario");
			disable('#val_descuento, #val_total');
			hide("#valor_kilo_row");
			show('#valor_unitario_row');
		break; 
		case '4': //Módulos
			enable('#pedidos_form input, #val_unitario');
			disable('#listas_precios, #val_descuento, #val_total');
			hide("#valor_kilo_row");
			show('#valor_unitario_row');
		break; 
		case '5': //Segundas
			enable('#pedidos_form input');
			disable('#val_descuento, #val_total');
			show('#valor_kilo_row');
			hide('#val_unitario_row');
		break; 
		case '6': //Otros
			enable('#pedidos_form input, #val_descuento, #val_unitario, #val_total');
			show('#val_unitario_row');
			disable('#listas_precios');
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
		$.codigo_cliente.val(data.cod_cliente);
		if($.tipo_pedido.val() == '1') {
			validateCC(data.cod_cliente);
		} else {
			enable($.next_btn);
		}
	}
});


/* Autocomplete código cliente */
$($.codigo_cliente).autocompleter({
	source: '/clientes/search_cod',
	customLabel: 'cod_cliente',
	callback: function (value, index, data) {
		$.nombre_cliente.val(data.nombre_cliente);
		if($.tipo_pedido.val() == '1') {
			validateCC(data.cod_cliente);
		} else {
			enable($.next_btn);
		}
	}
});


/* Autocomplete código producto */
$($.codigo_producto).autocompleter({
	source: '/producto/search_cod',
	customLabel: 'id',
	callback: function (value, index, data) {
		$.descripcion_producto.val(data.descripcion);
	}
});

/* Autocomplete descripción producto */
$($.descripcion_producto).autocompleter({
	source: '/producto/search_desc',
	customLabel: 'descripcion',
	callback: function (value, index, data) {
		$.codigo_producto.val(data.id);
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

/* Elimina el estilo display:none del selector */
function show(selector) {
	$(selector).removeClass('d-none');
}

/* Agrega el estilo display:none del selector */
function hide(selector) {
	$(selector).addClass('d-none');
}

/* Pone el borde del campo en color rojo y muestra el mensaje de error abajo del input */
function showInputError(selector, mensaje) {
	$(selector).removeClass('is-invalid');
	$(selector).addClass('is-invalid');
	$(selector+"_error").text(mensaje);
}

/* Pone el borde del campo en color verde y oculta el mensaje de error abajo del input */
function showInputSuccess(selector) {
	$(selector).removeClass('is-invalid');
	$(selector).addClass('is-valid');
	$(selector+"_error").text("");
}

function removeInputError(selector) {
	$(selector).removeClass('is-invalid');
	$(selector+"_error").text("");
}