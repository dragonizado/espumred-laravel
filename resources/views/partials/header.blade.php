{{-- Header donde se encuentra el logo, el botón de notificaciones, el logo del
usuario y el nombre del usuario, el botón de cerrar sessión y los settings --}}

<header class="app-header navbar">
	<button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a href="{{ url('/') }}" class="navbar-brand"></a>
	<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
		<span class="navbar-toggler-icon"></span>
	</button>


	<ul class="nav navbar-nav ml-auto">
		<li class="nav-item d-md-down-none">
			<a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
		</li>
		<li class="nav-item d-md-down-none">
			<a class="nav-link" href="#"><i class="icon-list"></i></a>
		</li>
		<li class="nav-item d-md-down-none">
			<a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<img src="{{ asset('images/logoespumred2.png') }}" class="img-avatar" alt="{{ Auth::user()->email }}">
				<span class="d-md-down-none">{{ Auth::user()->name }}</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<div class="dropdown-header text-center">
					<strong>Settings</strong>
				</div>
				<a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</div>
		</li>
	</ul>

	<button class="navbar-toggler aside-menu-toggler" type="button">
		<span class="navbar-toggler-icon"></span>
	</button>

</header>