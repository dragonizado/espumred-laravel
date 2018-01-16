// Este script requiere jquery
// Este script depende del main.js 

function validateCC(codigo){

	$.get("condiciones/validate", { codigo: codigo } )
	.done(function( data ) {
		if(data.action == "continuar") {
			$("#nombre_cliente").removeClass('is-invalid');
			$("#nombre_cliente").addClass('is-valid');
			$("#codigo_cliente").removeClass('is-invalid');
			$("#codigo_cliente").addClass('is-valid');
			$("#nombre_cliente_error").text("");
			toastr.success(data.mensaje, "Cliente válido");
			$.each(data.articulos, function(index, item) {
				$("#valor_kilo").append(`<option value="${item.nuevo_precio}">${item.descripcion} &nbsp; - &nbsp; ${accounting.formatMoney(item.nuevo_precio)}</option>`)
			});
			enable($.next_btn);
		} else if(data.action == "error") {
			$("#nombre_cliente").removeClass('is-invalid');
			$("#nombre_cliente").addClass('is-invalid');
			$("#codigo_cliente").removeClass('is-valid');
			$("#codigo_cliente").addClass('is-invalid');
			$("#nombre_cliente_error").text(data.mensaje);
			toastr.error(data.mensaje, "Error");
			disable($.next_btn);
		}
	})
	.fail(function(jqXHR, textStatus) {
		console.log(`xhr: ${jqXHR}, status: ${textStatus}`);
	})

}