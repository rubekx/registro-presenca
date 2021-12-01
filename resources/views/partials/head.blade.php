<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@if(env('APP_TELESSAUDE')) {{'SINTS MA'}} @else {{'DTED'}} @endif @yield('title')
</title>

<!-- Styles -->
<link href="/css/app.css" rel="stylesheet">
<link rel="stylesheet" href="/searchit/css/bootstrap-select.css">
<link href="/css/master.css" rel="stylesheet">
<link href="/css/dted.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

@yield('stylesheets')

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>