@extends('layouts.app')

@section('content')

	<div class="row">
		@foreach ($bloques as $bloque)
			
			<div class="col-sm-6 col-md-4">
				<a href="https://ih0.redbubble.net/image.145016392.5751/flat,800x800,075,f.jpg">
					<div class="card">
						<div class="card-body">
							<div class="h1 text-muted text-center mb-4">
								<i class="{{ $bloque->icono }}"></i>
							</div>
							<div class="h4 mb-4 text-center text-black">{{ $bloque->nombre }}</div>
						</div>
					</div>
				</a>
			</div>
			
		@endforeach
	</div>

@endsection

@section('right-sidebar')
	<aside class="aside-menu">

		<div class="tab-content">

			<div class="tab-pane p-3 active" id="settings" role="tabpanel">
				<h6>Settings</h6>

				<div class="aside-options">
					<div class="mt-4">
						<small><b>Option 1</b></small>
					</div>
					<div>
						<small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
					</div>
				</div>

				<div class="aside-options">
					<div class="mt-3">
						<small><b>Option 2</b></small>
					</div>
					<div>
						<small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
					</div>
				</div>

				<div class="aside-options">
					<div class="clearfix mt-3">
						<small><b>Option 3</b></small>
						<label class="switch switch-text switch-pill switch-success switch-sm float-right">
							<input type="checkbox" class="switch-input" checked="">
							<span class="switch-label" data-on="On" data-off="Off"></span>
							<span class="switch-handle"></span>
						</label>
					</div>
				</div>

				<hr>

			</div>
		</div>
	</aside>
@endsection
