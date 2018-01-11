/****************
*   VARIABLES   *
****************/

$.tipo_pedido = $("#tipo_pedido");
$.listas_precio = $("#listas_precio");
$.nombre_cliente = $("#nombre_cliente");
$.codigo_cliente = $("#codigo_cliente");
$.bonificacion = $("#bonificacion");
$.next_btn = $("#next_btn");

/****************
*     INIT      *
****************/

$(document).ready(function($){

	/* Deshabilitar inputs y select por defecto */
	$('#pedidos_form input, #pedidos_form select').not('#tipo_pedido').prop('disabled', true);
	$("#val_descuento, #val_unitario, #val_total").prop('disabled', true);

});


$.tipo_pedido.change(function(){
	var tipo_pedido = $(this).val();
	$(".title_tipo_pedido").text($('option:selected',this).text()).removeClass("d-none");

	if(tipo_pedido == 2 || tipo_pedido == 3) {
		$('#listas_precios').prop('disabled', false);
	} else {
		$('#listas_precios').prop('disabled', true);
	}
	$('#pedidos_form input, #pedidos_form select').not('#tipo_pedido, #listas_precios').prop('disabled',false);
});