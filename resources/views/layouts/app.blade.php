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

  <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

    @include('partials.header')

    <div class="app-body">

      @include('partials.left-sidebar')

      {{-- Contenido principal --}}
      <main class="main">
        <div class="container-fluid" style="margin-top:24px;">
          <div class="animated fadeIn">
            @yield('content')
          </div>
        </div>
      </main>

      @include('partials.right-sidebar')

    </div>

    <footer class="app-footer">
      <span><a href="http://espumred.com">Espumred</a> © 2017 Espumas Medellín.</span>
      <span class="ml-auto"><a href="http://www.espumasmedellin.com">Espumas Medellín</a></span>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
    
  </body>
</html>