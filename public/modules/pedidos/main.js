var date = new Date();
var timenow = date.getDay()+'/'+date.getMonth()+'/'+date.getFullYear();
var pedidos = new Vue({
	el: '#pedidos',
	data: {
		typeOrderOptions:[
			{
				name:'Espumas',
				value:1,
			},{
				name:'Colchones',
				value:2,
			},{
				name:'Muebles',
				value:3,
			},{
				name:'Modulos',
				value:4,
			},{
				name:'Segundas',
				value:5,
			},{
				name:'Otros',
				value:6,
			}
		],
		articles:[],
		temporaldetailorder:{
						numOrderCC:'', // numero de orden de compra
						codProd: '', // codigo del producto
						description:'', // decripcion del producto
						amount:'', // cantidad de productos
						valuekilo:0, // valor de kilo (espumas / lam / mod)
						porcentageAmount:'', // porcentaje de descuento al valor total
						porcentageValue:0, // cantidad de descuento en $$$  
						deliveryDate: timenow, // fecha de entrega
						unitValue:0, // valor unitario
						totalAmount:0, // sumatoria total del articulo
					},
		order:
			{
				typeOrderSelected:'',
				nameClient:'',
				codClient:'',
				observations:'',
				bonus:false,
				bonusDetails:[],
				totalAmount:300.000,
				detailsOrder:[
					{
						numOrderCC:'1', // numero de orden de compra
						codProd:'800000', // codigo del producto
						description:'lam prueba', // decripcion del producto
						amount:'120', // cantidad de productos
						valuekilo:'123444', // valor de kilo (espumas / lam / mod)
						porcentageAmount:'20', // porcentaje de descuento al valor total
						porcentageValue:'20000', // cantidad de descuento en $$$  
						deliveryDate:'26/02/2018', // fecha de entrega
						unitValue:'9.000', // valor unitario
						totalAmount:'100000', // sumatoria total del articulo
					},
					{
						numOrderCC:'2',
						codProd:'800000',
						description:'lam prueba 2',
						amount:'120',
						valuekilo:'123444',
						porcentageAmount:'20',
						porcentageValue:'20000', 
						deliveryDate:'26/02/2018',
						unitValue:'9.000',
						totalAmount:'200000',
					},
					{
						numOrderCC:'3',
						codProd:'800000',
						description:'lam prueba 3',
						amount:'120',
						valuekilo:'123444',
						porcentageAmount:'20',
						porcentageValue:'20000', 
						deliveryDate:'26/02/2018',
						unitValue:'9.000',
						totalAmount:'300000',
					}
					
				],
			}
	},
	// created: function() {
	// 	console.log("Hola Vue");
	// },
	methods:{
		validateCC: function(){
			let _url = 'condiciones/validate?codigo='+this.order.codClient;
			axios.get(_url).then(response => {
				if(response.data.action == "continuar"){
					removeInputError("#nombre_cliente");
					showInputSuccess("#nombre_cliente, #codigo_cliente");
					this.articles = response.data.articulos;
					enable($.next_btn);
				}else if(response.data.action == "error"){
					showInputError("#codigo_cliente, #nombre_cliente", response.data.mensaje);
					toastr.error(response.data.mensaje, "Error");
					disable($.next_btn);
				}
			});
		},
		additem: function(){
			this.order.detailsOrder.push(this.temporaldetailorder);
			this.calordertotal();
			this.temporaldetailorder = {
						numOrderCC:'',
						codProd:0,
						description:'',
						amount:0,
						valuekilo:0,
						porcentageAmount:0,
						porcentageValue:0,  
						deliveryDate:'',
						unitValue:0,
						totalAmount:0,
					}
		},
		removeitem: function(i){
			this.order.detailsOrder.splice(i,1);
		},
		calordertotal: function(){
			// alert("se ejecuto el metodo para calcular el total del pedido");
			let suma = 0;
			let obj = this.order.detailsOrder;
			let count = obj.length;
			for (var i = 1; i <= count;i++) {
				suma += parseFloat(obj[i-1]['totalAmount']);
			}
			this.order.totalAmount = suma;
		},
		calculo: function(){

			// para enviar por post
			// let _url = 'pedidos/calculo';
			// let data = new FormData();
			// data.append('codProd',this.temporaldetailorder.codProd);
			// data.append('amount',this.temporaldetailorder.amount);
			// data.append('porcentageAmount',this.temporaldetailorder.porcentageAmount);
			
			// axios.post(_url,data).then(response => {
			// 	console.log(response.data);
				
			// });

			// para enviar por get
			let _url = 'pedidos/calculo?codProd='+
			this.temporaldetailorder.codProd+
			'&amount='+this.temporaldetailorder.amount+
			'&valuekilo='+this.temporaldetailorder.valuekilo+
			'&porcentageAmount='+this.temporaldetailorder.porcentageAmount;
			axios.get(_url).then(response => {
				if(response.data.status != "error"){
					this.temporaldetailorder.porcentageValue = response.data.valor_descuento;
					this.temporaldetailorder.unitValue = response.data.valor_unitario;
					this.temporaldetailorder.totalAmount = response.data.valor_total;
				}
			});
		}
	}
})


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
$.step1 = $("#step1");
$.step2 = $("#step2");

/*********************
*        INIT        *
*********************/

$(document).ready(function($){

	/* Deshabilitar inputs y select por defecto */
	disable('#pedidos_form input, #pedidos_form select, #next_btn', '#tipo_pedido');
	disable('#val_descuento, #val_unitario, #val_total');
	hide("#valor_kilo_row");
	$.step2.height($.step1.height());
});


/* Tipo pedido change evento */
$.tipo_pedido.change(function(){
	$(".title_tipo_pedido").text($('option:selected',this).text()).removeClass("d-none");

	if($.codigo_cliente.val() && $.tipo_pedido.val() == 1) {
		pedidos.validateCC($.codigo_cliente.val());
	} else if ($.codigo_cliente.val() && $.tipo_pedido.val() > 1){
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
		pedidos.order.codClient = data.cod_cliente;
		pedidos.order.nameClient = data.nombre_cliente;
		// $.codigo_cliente.val(data.cod_cliente);
		// if($.tipo_pedido.val() == '1') {
		if(pedidos.order.typeOrderSelected == '1') {
			pedidos.validateCC(data.cod_cliente);
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
		pedidos.order.nameClient = data.nombre_cliente;
		pedidos.order.codClient = data.cod_cliente;
		// $.nombre_cliente.val(data.nombre_cliente);
		// if($.tipo_pedido.val() == '1') {
		if(pedidos.order.typeOrderSelected == '1') {
			pedidos.validateCC(data.cod_cliente);
		} else {
			enable($.next_btn);
		}
	}
});


/* Autocomplete código producto */
$($.codigo_producto).autocompleter({
	source: '/productos/search_cod',
	customLabel: 'id',
	callback: function (value, index, data) {
		// $.descripcion_producto.val(data.descripcion);
		pedidos.temporaldetailorder.description = data.descripcion;
		pedidos.temporaldetailorder.codProd = data.id;

	}
});

/* Autocomplete descripción producto */
$($.descripcion_producto).autocompleter({
	source: '/productos/search_desc',
	customLabel: 'descripcion',
	callback: function (value, index, data) {
		// $.codigo_producto.val(data.id);
		pedidos.temporaldetailorder.codProd = data.id;
		pedidos.temporaldetailorder.description = data.descripcion;
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