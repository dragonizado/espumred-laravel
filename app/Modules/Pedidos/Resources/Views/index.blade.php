@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<div class="row">
						<div class="col-sm-12">
							<h3 class="card-title clearfix">Solicitud de Pedido</h3>
						</div>
					</div>

					<hr class="m-0">

					<div class="row pt-3">
						<div class="col-sm-12">
							<div class="card ov-hidden">
								<div class="card-header">
									<strong>{{ Auth::user()->name }}</strong>		
								</div>

								<div id="slider">

									<div id="step1" class="card-body step">
										<form action="#" method="post">

											<div class="row">
												<div class="col-md-6 col-xs-12">
													<div class="form-group">
														<label for="tipo_pedido">Tipo de Pedido</label>
														<select class="form-control" id="tipo_pedido">
															<option value="" disabled selected>Seleccione una opción</option>
															<option value="1">Espumas</option>
															<option value="2">Colchones</option>
															<option value="3">Muebles</option>
															<option value="5">Modulos</option>
															<option value="6">Segundas</option>
															<option value="4">Otros</option>
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
														<input type="text" class="form-control" id="nombre_cliente">
													</div>
												</div>
												<div class="col-md-6 col-xs-12">
													<div class="form-group">
														<label for="name">Código Cliente</label>
														<input type="text" class="form-control" id="codigo_cliente">
													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="name">Observaciones</label>
												<input type="text" class="form-control" id="observaciones">
											</div>

											<div class="form-group row">
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

											<div class="form-group">
												<button id="next_btn" onclick="stepNext()" type="button" class="btn btn-success">
													<b>Siguiente</b> &nbsp; <i class="fa fa-arrow-right"></i>
												</button>
											</div>

										</form>
									</div>

									<div id="step2" class="card-body step">
										<div class="form-horizontal row">
											<div class="col-md-5">
												<div class="form-group row">
													<label class="col-md-3 form-control-label" for="hf-email">Field</label>
													<div class="col-md-9">
														<input type="email" id="hf-email" name="hf-email" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 form-control-label" for="hf-password">Field</label>
													<div class="col-md-9">
														<input type="email" id="hf-email" name="hf-email" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 form-control-label" for="hf-password">Field</label>
													<div class="col-md-9">
														<input type="email" id="hf-email" name="hf-email" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 form-control-label" for="hf-password">Field</label>
													<div class="col-md-9">
														<input type="email" id="hf-email" name="hf-email" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 form-control-label" for="hf-password">Field</label>
													<div class="col-md-9">
														<input type="email" id="hf-email" name="hf-email" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 form-control-label" for="hf-password">Field</label>
													<div class="col-md-9">
														<input type="email" id="hf-email" name="hf-email" class="form-control">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 form-control-label" for="hf-password">Field</label>
													<div class="col-md-9">
														<input type="email" id="hf-email" name="hf-email" class="form-control">
													</div>
												</div>

												<div class="form-group">
													<button id="prev_btn" onclick="stepPrev()" type="button" class="btn btn-success">
														<i class="fa fa-arrow-left"></i>&nbsp; <b>Volver</b> 
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
@endsection


@section('scripts')
	<script src="{{ asset('modules/pedidos/main.js') }}"></script>
@endsection