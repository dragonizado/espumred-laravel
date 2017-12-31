@extends('layouts.auth') 

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card-group">
				<div class="card p-4">
					<div class="card-body">
						<h1>Iniciar Sesión</h1>
						<p class="text-muted">Iniciar sesión en tu cuenta</p>

						<form class="form-horizontal" method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}

							<div class="input-group mb-3">
								<span class="input-group-addon"><i class="icon-user"></i></span>
								<input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
							</div>
							<div style="color: #f86c6b;" class="help-block">{{ $errors->first('email') }}</div>

							<div class="input-group mb-4">
								<span class="input-group-addon"><i class="icon-lock"></i></span>
								<input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
							</div>

							<input type="checkbox" name="remember" style="display:none;" checked>

							<div class="row">
								<div class="col-6">
									<button type="submit" class="btn btn-primary px-4">Iniciar Sesión</button>
								</div>
								<div class="col-6 text-right">
									<a href="{{ route('password.request') }}" class="btn btn-link px-0">¿Olvidaste tu contraseña?</a>
								</div>
							</div>

						</form>

					</div>
				</div>
				<div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
		            <div class="card-body text-center">
		              <div>
		                <h2>No tienes cuenta?</h2>
		                <p>Puedes realizar otras operaciones en el sistema como consultar nuestro directorio telefonico, realizar operaciones con nuestros convenios o presentar tu hoja de vida para trabajar con nosotros.</p>
		                <button type="button" class="btn btn-primary active mt-3">Ver ahora!</button>
		              </div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection