<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ env('APP_NAME')}} @yield('title')</title>

<!-- Styles -->
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/master.css') }}" rel="stylesheet">
<link href="{{ asset('/css/dted.css') }}" rel="stylesheet">
<link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('/css/reponsive-dted.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('/searchit/css/bootstrap-select.css') }}" rel="stylesheet">
<!-- Styles -->

<!-- Adicionar estilos customizados-->
@yield('stylesheets')
<!-- Adicionar estilos customizados-->

