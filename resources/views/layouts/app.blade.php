<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.navbar')
    @yield('content')
    @include('partials.footer')
    @include('partials.scripts')
    @yield('post-script')
</body>

</html>
