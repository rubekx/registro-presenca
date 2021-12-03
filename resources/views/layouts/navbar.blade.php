<nav class="navbar">
    <a href="/"><img src="img/svg/header/dted-logo.svg" class="dted-header-logo" alt="dted-logo"></a>
    <button id="home-page" type='button' class="btn dted-header-button text-right right-block">Voltar à página inicial</button>
</nav>
@section('jscript')
    <script type="text/javascript">
        document.getElementById("home-page").onclick = function() {
            location.href = "{{ route('welcome') }}";
        };
    </script>
@endsection
