// Este script requiere jquery
// Este script depende del main.js 

function validateCC(codigo){

	$.get("condiciones/validate", { codigo: codigo } )
	.done(function( data ) {
		console.log(data);
		if(data.action == "continuar") {
			$("#nombre_cliente").removeClass('is-invalid');
			$("#nombre_cliente").addClass('is-valid');
			$("#codigo_cliente").removeClass('is-invalid');
			$("#codigo_cliente").addClass('is-valid');
			$("#nombre_cliente_error").text("");
			enable($.next_btn);
		} else if(data.action == "error") {
			$("#nombre_cliente").removeClass('is-invalid');
			$("#nombre_cliente").addClass('is-invalid');
			$("#codigo_cliente").removeClass('is-valid');
			$("#codigo_cliente").addClass('is-invalid');
			$("#nombre_cliente_error").text(data.mensaje);
			disable($.next_btn);
		}
	})
	.fail(function(jqXHR, textStatus) {
		console.log(`xhr: ${jqXHR}, status: ${textStatus}`);
	})

}