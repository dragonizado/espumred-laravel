$('input, select').not('#tipo_pedido').prop('disabled', true);

$("#tipo_pedido").change(function(){
	var tipo_pedido = $(this).val();

	if(tipo_pedido == 2 || tipo_pedido == 3) {
		$('#listas_precios').prop('disabled', false);
	} else {
		$('#listas_precios').prop('disabled', true);
	}
	$('input, select').not('#tipo_pedido, #listas_precios').prop('disabled', false);
});