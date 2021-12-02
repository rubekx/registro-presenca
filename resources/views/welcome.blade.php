@extends('layouts.app')

@section('content')
    <h1 class="dted-home-h1">Registro de presença</h1>
    <h2 class="dted-home-h2">Registre aqui sua presença em eventos da DTED</h2>
    <button id="search-event" class="btn dted-home-button">Entre para procurar seu evento</button>
    <img src="img/svg/home/people.svg" class="dted-home-people" alt="dted-logo">
@endsection
@section('jscript')
<script type="text/javascript">
    document.getElementById("search-event").onclick = function () {
        location.href = "{{route('home')}}";
    };
</script>
@endsection