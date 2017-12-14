<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Espumred Espumas medellín">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="author" content="Espumas Medellín">
		<meta name="keyword" content="Espumas,Medellín,Espumas Medellín,Espumred">
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
		<title>EspumRed - Sitio</title>
		<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	</head>

	<body class="app flex-row align-items-center">

		@yield('content')

		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	</body>
</html>