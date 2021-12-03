<nav class="navbar">
    <img src="img/svg/header/dted-logo.svg" class="dted-header-logo" alt="dted-logo">
    <button id="home-page" type='button' class="btn dted-header-button pull-right">Voltar à página inicial</button>
</nav>
@section('jscript')
    <script type="text/javascript">
        document.getElementById("home-page").onclick = function() {
            location.href = "{{ route('welcome') }}";
        };
    </script>
@endsection
