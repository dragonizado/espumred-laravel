// Este script requiere jquery
// Este script depende del main.js 


function validate_CC(_cod){
	let _url= "/condiciones/validate/";
	$.ajax({
		method:"get",
		url:_url,
		data:{cod:_cod},
		dataType:"JSON",
	}).done(function(done){
		switch(done.action){
			case'continuar':
				$("#nombre_cliente").removeClass('is-invalid');
		        $("#nombre_cliente").addClass('is-valid');
		        $("#codigo_cliente").removeClass('is-invalid');
		        $("#codigo_cliente").addClass('is-valid');
		        $("#errors-clientgroup").addClass("hidden");
			    $("#errors-clientgroup").html(done.mensaje);
			    //valuesofcc(done.id);
			    //valuesofccVU(done.id);
			    enable($.next_btn);
			break;
			case'error':
				$("#nombre_cliente").removeClass('is-invalid');
		        $("#nombre_cliente").addClass('is-invalid');
		        $("#codigo_cliente").removeClass('is-valid');
		        $("#codigo_cliente").addClass('is-invalid');
		        $("#errors-clientgroup").removeClass("hidden");
		        $("#errors-clientgroup").html(done.mensaje);
		        disable($.next_btn);
			break;
			default:
			console.log("hay un error en obtener el valor de la respuesta");
			break;
		}
		console.log(done);
	}).fail(function(e){

	});
}