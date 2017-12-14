@extends('layouts.app')

@section('content')

<div class="row">
	@foreach ($areas as $area)
		
		<div class="col-sm-6 col-md-4">
			<a href="{{ route('modulos', $area->id) }}">
				<div class="card">
					<div class="card-body">
						<div class="h1 text-muted text-center mb-4">
							<i class="{{ $area->icono }}"></i>
						</div>
						<div class="h4 mb-4 text-center text-black">{{ $area->nombre }}</div>
					</div>
				</div>
			</a>
		</div>
		
	@endforeach
</div>

@endsection
