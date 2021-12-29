@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-offset-1 col-md-5">
                <img src="img/svg/home/text.svg" class="dted-home-text-svg">
                <button type='button' id="search-event"  class="dted-home-button" style="margin-right: 0%">Entre para procurar seu
                    evento</button>
            </div>
            <div class="col-md-5">
                <img src="img/svg/home/people.svg" class="dted-home-people-svg">
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
