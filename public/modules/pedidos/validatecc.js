// Este script requiere jquery
// Este script depende del main.js 

function validateCC(codigo){

	$.get("condiciones/validate", { codigo: codigo } )
	.done(function( data ) {
		if(data.action == "continuar") {
			removeInputError("#nombre_cliente");
			showInputSuccess("#nombre_cliente, #codigo_cliente");
			toastr.success(data.mensaje, "Cliente válido");
			$('#valor_kilo').find('option:not(:first)').remove();
			$.each(data.articulos, function(index, item) {
				$("#valor_kilo").append(`<option value="${item.nuevo_precio}">${item.descripcion} &nbsp; - &nbsp; ${accounting.formatMoney(item.nuevo_precio)}</option>`)
			});
			enable($.next_btn);
		} else if(data.action == "error") {
			showInputError("#codigo_cliente, #nombre_cliente", data.mensaje);
			toastr.error(data.mensaje, "Error");
			disable($.next_btn);
		}
	})
	.fail(function(jqXHR, textStatus) {
		console.log(`xhr: ${jqXHR}, status: ${textStatus}`);
	})

}