<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ env('APP_NAME')}} @yield('title')</title>

<!-- Styles -->
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/dted.css') }}" rel="stylesheet">
<link href="{{ asset('/css/master.css') }}" rel="stylesheet">
<link href="{{ asset('/searchit/css/bootstrap-select.css') }}" rel="stylesheet">
<!-- Styles -->

<!-- Adicionar estilos customizados-->
@yield('stylesheets')
<!-- Adicionar estilos customizados-->
