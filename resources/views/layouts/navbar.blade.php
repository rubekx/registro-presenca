<div class="dted-navbar">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('logout') }}">
                    <img src="{{ asset('img/svg/header/dted-logo.svg') }}" alt="Brand">
                </a>
            </div>
            <div id="navbar3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('logout') }}">
                            <button id="home-page" type='button' class="btn dted-header-button">Voltar à página inicial</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
