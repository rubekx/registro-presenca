<nav class="navbar">
    <a href="{{ route('logout') }}">
        <img src="{{ asset('img/svg/header/dted-logo.svg')}}" class="dted-header-logo" alt="dted-logo">
    </a>
    <button id="home-page" type='button' class="btn dted-header-button pull-right">Voltar à página inicial</button>
</nav>
@section('jscript-header')
    <script type="text/javascript">
        $("#home-page").click(function() {
            location.href = "{{ route('logout') }}";
        });
    </script>
@endsection