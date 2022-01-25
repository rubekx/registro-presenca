<div class="dted-header">
    <img src="img/svg/header/dted-logo.svg" class="dted-header-logo" alt="dted-logo">
    <button id="home-page" type='button' class="dted-header-button">Voltar à página inicial</button>
</div>
@section('jscript')
<script type="text/javascript">
    document.getElementById("home-page").onclick = function () {
        location.href = "{{route('welcome')}}";
    };
</script>
@endsection