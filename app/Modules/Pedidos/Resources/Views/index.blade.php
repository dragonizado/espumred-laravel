@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<div class="row">
						<div class="col-sm-12">
							<h4 class="card-title clearfix">Solicitud de Pedido</h4>
						</div>
					</div>

					<hr class="m-0">

					<div class="row pt-3" id="pedidos">
						<div class="col-sm-12">
							<div class="card ov-hidden">
								<div class="card-header">
									<strong>{{ Auth::user()->name }}</strong>	
									<span class="title_tipo_pedido badge-title d-none badge-espumas float-right"></span>
								</div>

								<div id="slider">

									<div id="step1" class="card-body step">
										<form id="pedidos_form" action="{{ url('pedidos') }}" method="post">

											<div class="row">
												<div class="col-md-6 col-xs-12">
													<div class="form-group">
														<label for="tipo_pedido">Tipo de Pedido</label>
														<select class="form-control" id="tipo_pedido" v-model="order.typeOrderSelected">
															<option value="" disabled selected>Seleccione una opción</option>
															<option v-for="option in typeOrderOptions" v-bind:value="option.value">@{{option.name}}</option>
														</select>
													</div>
												</div>
												<div class="col-md-6 col-xs-12">
													<div class="form-group">
														<label for="listas_precios">Lista de Precios</label>
														<select class="form-control" id="listas_precios">
															<option value="" disabled selected>Seleccione una opción</option>
															@foreach($listasprecios as $listaprecio)
																<option value="{{ $listaprecio->id }}">{{ $listaprecio->descripcion }}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6 col-xs-12">
													<div class="form-group">
														<label for="name">Nombre Cliente</label>
														<input type="text" class="form-control" id="nombre_cliente" v-model="order.nameClient">
														<div id="nombre_cliente_error" class="invalid-feedback"></div>
													</div>
												</div>
												<div class="col-md-6 col-xs-12">
													<div class="form-group">
														<label for="name">Código Cliente</label>
														<input type="text" class="form-control" id="codigo_cliente" v-model="order.codClient">
														<div id="codigo_cliente_error" class="invalid-feedback"></div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="name">Observaciones</label>
												<input type="text" class="form-control" id="observaciones">
											</div>

											<div class="form-group row mb-2">
												<label class="col-md-2" style="flex: 0 0 170px; max-width: 170px;">
													¿Aplica bonificación?
												</label>
												<div class="col-md-9">
													<label class="switch switch-text switch-success">
														<input type="checkbox" class="switch-input" id="bonificacion">
														<span class="switch-label" data-on="Si" data-off="No"></span>
														<span class="switch-handle"></span>
													</label>
												</div>
											</div>

											<div id="bonificacion_container" class="d-none">
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label for="detalle_bonificacion">Bonificación</label>
															<input type="text" class="form-control" id="detalle_bonificacion">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="referencia_bonificacion">Referencia</label>
															<input type="text" class="form-control" id="referencia_bonificacion">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="codigo_bonificacion">Código</label>
															<input type="text" class="form-control" id="codigo_bonificacion">
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
															<label for="cantidad_bonificacion">Cantidad</label>
															<input type="number" class="form-control" id="cantidad_bonificacion">
														</div>
													</div>
													<div class="col-md-1">
														<div class="form-group">
															<label class="d-block">&nbsp;</label>
															<button class="btn btn-success" id="add_bonificacion">
																<i class="font-weight-bold icon-plus"></i>
															</button>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<button id="next_btn" onclick="stepNext()" type="button" class="btn btn-success mt-2">
													<b>Siguiente</b> &nbsp; <i class="fa fa-arrow-right"></i>
												</button>
											</div>

										</form>
									</div>

									<div id="step2" class="card-body step">
										<div class="form-horizontal row">
											<div class="col-md-5">
												<div class="form-group row">
													<label class="col-md-4 f12 form-control-label">Orden de compra cliente</label>
													<div class="col-md-8">
														<input type="number" id="orden_compra" name="orden_compra" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-4 f12 pt-2 form-control-label">Código Producto</label>
													<div class="col-md-8">
														<input type="text" id="cod_producto" name="cod_producto" placeholder="#######" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-4 f12 pt-2 form-control-label">Descripción</label>
													<div class="col-md-8">
														<input type="text" id="desc_producto" name="desc_producto" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-4 f12 pt-2 form-control-label">Cantidad</label>
													<div class="col-md-8">
														<input type="number" id="cantidad" name="cantidad" placeholder="##" class="form-control">
													</div>
												</div>

												<div class="form-group row" id="valor_kilo_row">
													<label class="col-md-4 f12 pt-2 form-control-label">Valor Kilo</label>
													<div class="col-md-8">
														<select  id="valor_kilo" name="valor_kilo" class="form-control">
															<option value="" disabled selected>Seleccione un valor</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-4 f12 form-control-label">Porcentaje Descuento</label>
													<div class="col-md-8">
														<input type="number" id="descuento" name="descuento" placeholder="##" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-4 f12 pt-2 form-control-label">Valor Descuento</label>
													<div class="col-md-8">
														<input type="text" id="val_descuento" name="val_descuento" class="form-control">
													</div>
												</div>

												<div class="form-group row" id="val_unitario_row">
													<label class="col-md-4 f12 pt-2 form-control-label">Valor Unitario</label>
													<div class="col-md-8">
														<input type="text" id="val_unitario" name="val_unitario" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-4 f12 pt-2 form-control-label">Valor total</label>
													<div class="col-md-8">
														<input type="text" id="val_total" name="val_total" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-4 f12 pt-2 form-control-label">Fecha de entrega</label>
													<div class="col-md-8">
														<input type="text" id="fecha_entrega" name="fecha_entrega" class="form-control datepicker">
													</div>
												</div>

												<div class="form-group">
													<button id="prev_btn" onclick="stepPrev()" type="button" class="btn btn-success mt-2">
														<i class="fa fa-arrow-left"></i>&nbsp; <b>Volver</b> 
													</button>
												</div>
											</div>
											<div class="col-md-7">
												<table class="table table-bordered border-0">
													<thead class="thead-default f12">
														<tr>
															<th>N° Orden</th>
															<th>Descripción Producto</th>
															<th>Valor Unitario</th>
															<th>Valor Total</th>
															<th class="eliminar">Eliminar</th>
														</tr>
													</thead>
													<tbody>
														<tr v-for="orderdetailinfo in order.detailsOrder">
															<th scope="row">@{{orderdetailinfo.numOrderCC}}</th>
															<td>@{{orderdetailinfo.description}}</td>
															<td>@{{orderdetailinfo.unitValue}}</td>
															<td>@{{orderdetailinfo.totalAmount}}</td>
															<td class="text-center">
																<button class="btn btn-danger lh-1 p-1">
																	<i class="font-weight-bold icon-close"></i>
																</button>
															</td>
														</tr>
													</tbody>
													<tfoot>
														<tr>
															<td class="border-left-0 border-bottom-0" colspan="2"></td>
															<td colspan="3">
																<div class="d-flex justify-content-between">
																	<div class="h5 mb-0">Total: </div>
																	<div class="h5 mb-0">$@{{order.totalAmount}}</div>
																</div>
															</td>
														</tr>
													</tfoot>
												</table>

												<div class="row">
													<div class="col-md-6">
														<button type="button" class="btn btn-primary btn-lg btn-block">
															<i class="icon-eyeglass"></i> Vista Previa
														</button>
													</div>
													<div class="col-md-6">
														<button type="button" class="btn btn-success btn-lg btn-block">
															Enviar Pedido <i class="icon-paper-plane"></i>
														</button>
													</div>
												</div>


											</div>
										</div>
									</div>

								</div>
									
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection


@push('scripts')
	<script src="{{ asset('modules/pedidos/main.js') }}"></script>
	<script src="{{ asset('modules/pedidos/validatecc.js') }}"></script>
@endpush