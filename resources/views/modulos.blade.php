@extends('layouts.app')

@section('content')

<div class="row">
	@foreach ($modulos as $modulo)
		
		<div class="col-sm-6 col-md-4">
			<a href="https://ih0.redbubble.net/image.145016392.5751/flat,800x800,075,f.jpg">
				<div class="card">
					<div class="card-body">
						<div class="h1 text-muted text-center mb-4">
							<i class="{{ $modulo->icono }}"></i>
						</div>
						<div class="h4 mb-4 text-center text-black">{{ $modulo->nombre }}</div>
					</div>
				</div>
			</a>
		</div>
		
	@endforeach
</div>

@endsection
