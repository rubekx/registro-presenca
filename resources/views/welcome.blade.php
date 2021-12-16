@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-md-6">
                <h1 class="dted-home-h1">Registro de presença</h1>
                <h2 class="dted-home-h2">Registre aqui sua presença em eventos da DTED</h2>
                <button type='button' id="search-event" class="btn dted-home-button pull-center">Entre para procurar seu
                    evento</button>
            </div>
            <div class="col-sm-10 col-md-6">
                <img src="img/svg/home/people.svg" class="dted-home-people-svg">
            </div>
        </div>
    </div>
@endsection
@section('jscript')
    <script type="text/javascript">
        $(function() {
            $(".dted-header-button").hide();
        });
    </script>
    <script type="text/javascript">
        document.getElementById("search-event").onclick = function() {
            location.href = "{{ route('login') }}";
        };
    </script>
@endsection
