{{-- Barra izquierda, menu de la aplicación --}}

<div class="sidebar">
	<nav class="sidebar-nav">
		<ul class="nav" style="margin-top: 10px;">

			<li class="nav-item">
				<a class="nav-link active" href="{{ url('/') }}"><i class="icon-calculator"></i> Home</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Menu 2</a>
			</li>

			<li class="nav-item nav-dropdown">
				<a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Components</a>
				<ul class="nav-dropdown-items">
					<li class="nav-item">
						<a class="nav-link" href="components-modals.html"><i class="icon-puzzle"></i> Modals</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="components-switches.html"><i class="icon-puzzle"></i> Switches</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="components-tables.html"><i class="icon-puzzle"></i> Tables</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="components-tabs.html"><i class="icon-puzzle"></i> Tabs</a>
					</li>
				</ul>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
			</li>

			<li class="nav-item nav-dropdown">
				<a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
				<ul class="nav-dropdown-items">
					<li class="nav-item">
						<a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
					</li>
				</ul>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Menu 3</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Menu 4</a>
			</li>

		</ul>
	</nav>
	<button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>