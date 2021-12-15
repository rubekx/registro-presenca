<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('layouts.header')
</head>

<body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('jscript-header')
    @yield('post-script')
    @yield('jscript')
</body>

</html>
