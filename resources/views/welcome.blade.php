<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bem Vindo!</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/master.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif --}}

            <div class="content">
                <div class="title m-b-md">
                    <a href="{{ url('login') }}">
                        @if(env('APP_TELESSAUDE'))
                            <img src="img/logo.png">
                        @else
                            <img src="img/dted.png">
                        @endif
                    </a>
                </div>

                <div class="links">
                    <a href="{{ url('login') }}">Registrar Presença</a>
                </div>
            </div>
        </div>
    </body>
</html>
