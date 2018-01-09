$('input, select').not('#tipo_pedido').prop('disabled', true);

$("#tipo_pedido").change(function(){
	$('input, select').not('#tipo_pedido').prop('disabled', false);
});