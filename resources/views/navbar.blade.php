<link href="//fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<style>
    /**********************************
Responsive navbar-brand image CSS
- Remove navbar-brand padding for firefox bug workaround
- add 100% height and width auto ... similar to how bootstrap img-responsive class works
***********************************/

    .navbar-brand {
        padding: 0px;
    }

    .navbar-brand>img {
        height: 100%;
        padding: 15px;
        width: auto;
    }







    /*************************
EXAMPLES 2-7 BELOW 
**************************/

    /* EXAMPLE 2 (larger logo) - simply adjust top bottom padding to make logo larger */

    .example2 .navbar-brand>img {
        padding: 7px 15px;
    }


    /* EXAMPLE 3

line height is 20px by default so add 30px top and bottom to equal the new .navbar-brand 80px height  */

    .example3 .navbar-brand {
        height: 80px;
    }

    .example3 .nav>li>a {
        padding-top: 30px;
        padding-bottom: 30px;
    }

    .example3 .navbar-toggle {
        padding: 10px;
        margin: 25px 15px 25px 0;
    }


    /* EXAMPLE 4 - Small Narrow Logo*/
    .example4 .navbar-brand>img {
        padding: 7px 14px;
    }


    /* EXAMPLE 5 - Logo with Text*/
    .example5 .navbar-brand {
        display: flex;
        align-items: center;
    }

    .example5 .navbar-brand>img {
        padding: 7px 14px;
    }


    /* EXAMPLE 6 - Background Logo*/
    .example6 .navbar-brand {
        background: url(https://gitlab.com/honeymarket/honeymarket.com/uploads/bbff8bb1081293043a0d71c3d427514e/HM16_aino_regular_s.svg) center / contain no-repeat;
        width: 200px;
    }





    /* EXAMPLE 8 - Center on mobile*/
    @media only screen and (max-width : 768px) {
        .example-8 .navbar-brand {
            padding: 0px;
            transform: translateX(-50%);
            left: 50%;
            position: absolute;
        }

        .example-8 .navbar-brand>img {
            height: 100%;
            width: auto;
            padding: 7px 14px;
        }
    }


    /* EXAMPLE 8 - Center Background */
    .example-8 .navbar-brand {
        background: url(https://gitlab.com/honeymarket/honeymarket.com/uploads/bbff8bb1081293043a0d71c3d427514e/HM16_aino_regular_s.svg) center / contain no-repeat;
        width: 200px;
        transform: translateX(-50%);
        left: 50%;
        position: absolute;
    }





    /* EXAMPLE 9 - Center with Flexbox and Text*/
    .brand-centered {
        display: flex;
        justify-content: center;
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
    }

    .brand-centered .navbar-brand {
        display: flex;
        align-items: center;
    }





    /* CSS Transform Align Navbar Brand Text ... This could also be achieved with table / table-cells */
    .navbar-alignit .navbar-header {
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        transform-style: preserve-3d;
        height: 50px;
    }

    .navbar-alignit .navbar-brand {
        top: 50%;
        display: block;
        position: relative;
        height: auto;
        transform: translate(0, -50%);
        margin-right: 15px;
        margin-left: 15px;
    }





    .navbar-nav>li>.dropdown-menu {
        z-index: 9999;
    }

    body {
        font-family: "Lato";
    }

</style>

<br>
<div class="container">
    <p class="lead"> This is an <b>updated</b> version of the <em class="text-danger">Bootstrap 3 navbar
            logos demo</em>. There is a <a target="_blank" rel="external"
            href="https://bugzilla.mozilla.org/show_bug.cgi?id=930218">bug in firefox</a> that incorrectly displays
        padding on
        images nested inside floating blocks. For more details and why it's important to use this method with the navbar
        logo read about check out this demo <a target="_blank"
            href="http://codepen.io/bootstrapped/details/OMXQVo">here</a>.
        <br><br>
        If you want to see how to get your navbar to automatically collapse if the menu items overflow, check out <a
            href="http://codepen.io/bootstrapped/pen/xOyAPz">this codepen</a>.
    </p>

    <p class="lead">
        If you want to create a sticky navbar check out <a target=_"blank"
            href="http://codepen.io/bootstrapped/details/jAKqLV/">this</a>. Or for sticky with pure js only see <a
            target=_"blank" href="http://codepen.io/bootstrapped/details/mEKAzG/">this</a> or alternatively <a
            target=_"blank" href="http://codepen.io/bootstrapped/details/vKAXZd/">this</a> which shows how to do it with
        affix events.
    </p>
</div>

<h1 class="text-center">Example 1 - Default Logo Resized to fit</h1>


<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://honeymarket.com.com"><img
                        src="https://gitlab.com/honeymarket/honeymarket.com/uploads/bbff8bb1081293043a0d71c3d427514e/HM16_aino_regular_s.svg"
                        alt="honey market">
                </a>
            </div>
            <div id="navbar1" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>


<h1 class="text-center">Example 2 - Increase logo size and add menu to right side</h1>


<div class="container example2">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://disputebills.com"><img
                        src="https://gitlab.com/honeymarket/honeymarket.com/uploads/bbff8bb1081293043a0d71c3d427514e/HM16_aino_regular_s.svg"
                        alt="Dispute Bills">
                </a>
            </div>
            <div id="navbar2" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>


<h1 class="text-center">Example 3 - Increase entire navbar height</h1>


<div class="example3">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://disputebills.com"><img
                        src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjwhLS0gQ3JlYXRlZCB3aXRoIElua3NjYXBlIChodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy8pIC0tPgoKPHN2ZwogICB4bWxuczpvc2I9Imh0dHA6Ly93d3cub3BlbnN3YXRjaGJvb2sub3JnL3VyaS8yMDA5L29zYiIKICAgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIgogICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIgogICB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiCiAgIHhtbG5zOnN2Zz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIKICAgeG1sbnM6c29kaXBvZGk9Imh0dHA6Ly9zb2RpcG9kaS5zb3VyY2Vmb3JnZS5uZXQvRFREL3NvZGlwb2RpLTAuZHRkIgogICB4bWxuczppbmtzY2FwZT0iaHR0cDovL3d3dy5pbmtzY2FwZS5vcmcvbmFtZXNwYWNlcy9pbmtzY2FwZSIKICAgd2lkdGg9IjQ3MC40NjE4OCIKICAgaGVpZ2h0PSI2NS42NjUwODUiCiAgIGlkPSJzdmcyOTg5IgogICB2ZXJzaW9uPSIxLjEiCiAgIGlua3NjYXBlOnZlcnNpb249IjAuOTEgcjEzNzI1IgogICBzb2RpcG9kaTpkb2NuYW1lPSJobS5zdmciCiAgIGlua3NjYXBlOmV4cG9ydC1maWxlbmFtZT0iL2hvbWUvdG9ybWkvSE0uQ09NL2Fpbm8vSE0xNl9haW5vLnN2Zy5wbmciCiAgIGlua3NjYXBlOmV4cG9ydC14ZHBpPSIxMjMuNDYwNyIKICAgaW5rc2NhcGU6ZXhwb3J0LXlkcGk9IjEyMy40NjA3Ij4KICA8ZGVmcwogICAgIGlkPSJkZWZzMjk5MSI+CiAgICA8bGluZWFyR3JhZGllbnQKICAgICAgIGlkPSJsaW5lYXJHcmFkaWVudDQ0ODkiCiAgICAgICBvc2I6cGFpbnQ9InNvbGlkIj4KICAgICAgPHN0b3AKICAgICAgICAgc3R5bGU9InN0b3AtY29sb3I6IzAwMDAwMDtzdG9wLW9wYWNpdHk6MTsiCiAgICAgICAgIG9mZnNldD0iMCIKICAgICAgICAgaWQ9InN0b3A0NDkxIiAvPgogICAgPC9saW5lYXJHcmFkaWVudD4KICA8L2RlZnM+CiAgPHNvZGlwb2RpOm5hbWVkdmlldwogICAgIGlkPSJiYXNlIgogICAgIHBhZ2Vjb2xvcj0iI2ZmZmZmZiIKICAgICBib3JkZXJjb2xvcj0iIzY2NjY2NiIKICAgICBib3JkZXJvcGFjaXR5PSIxLjAiCiAgICAgaW5rc2NhcGU6cGFnZW9wYWNpdHk9IjAuMCIKICAgICBpbmtzY2FwZTpwYWdlc2hhZG93PSIyIgogICAgIGlua3NjYXBlOnpvb209IjEuNCIKICAgICBpbmtzY2FwZTpjeD0iMjIyLjE5MTQ0IgogICAgIGlua3NjYXBlOmN5PSIwLjE2Mzc2NTc4IgogICAgIGlua3NjYXBlOmRvY3VtZW50LXVuaXRzPSJweCIKICAgICBpbmtzY2FwZTpjdXJyZW50LWxheWVyPSJnMzE2MSIKICAgICBzaG93Z3JpZD0iZmFsc2UiCiAgICAgaW5rc2NhcGU6d2luZG93LXdpZHRoPSIxODc5IgogICAgIGlua3NjYXBlOndpbmRvdy1oZWlnaHQ9IjEwNTYiCiAgICAgaW5rc2NhcGU6d2luZG93LXg9IjQxIgogICAgIGlua3NjYXBlOndpbmRvdy15PSIyNCIKICAgICBpbmtzY2FwZTp3aW5kb3ctbWF4aW1pemVkPSIxIgogICAgIHNob3dndWlkZXM9ImZhbHNlIgogICAgIGlua3NjYXBlOnNuYXAtZ2xvYmFsPSJmYWxzZSIKICAgICBmaXQtbWFyZ2luLXRvcD0iMyIKICAgICBmaXQtbWFyZ2luLWxlZnQ9IjMiCiAgICAgZml0LW1hcmdpbi1yaWdodD0iMyIKICAgICBmaXQtbWFyZ2luLWJvdHRvbT0iMyIKICAgICBzaG93Ym9yZGVyPSJ0cnVlIgogICAgIGlua3NjYXBlOnNob3dwYWdlc2hhZG93PSJmYWxzZSI+CiAgICA8aW5rc2NhcGU6Z3JpZAogICAgICAgdHlwZT0ieHlncmlkIgogICAgICAgaWQ9ImdyaWQ1OTUyIgogICAgICAgZW1wc3BhY2luZz0iNSIKICAgICAgIHZpc2libGU9InRydWUiCiAgICAgICBlbmFibGVkPSJ0cnVlIgogICAgICAgc25hcHZpc2libGVncmlkbGluZXNvbmx5PSJ0cnVlIgogICAgICAgb3JpZ2lueD0iLTg1LjU3MTgwOSIKICAgICAgIG9yaWdpbnk9Ii01NzkuMDQ0ODQiIC8+CiAgPC9zb2RpcG9kaTpuYW1lZHZpZXc+CiAgPG1ldGFkYXRhCiAgICAgaWQ9Im1ldGFkYXRhMjk5NCI+CiAgICA8cmRmOlJERj4KICAgICAgPGNjOldvcmsKICAgICAgICAgcmRmOmFib3V0PSIiPgogICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2Uvc3ZnK3htbDwvZGM6Zm9ybWF0PgogICAgICAgIDxkYzp0eXBlCiAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4KICAgICAgICA8ZGM6dGl0bGU+PC9kYzp0aXRsZT4KICAgICAgICA8ZGM6Y3JlYXRvcj4KICAgICAgICAgIDxjYzpBZ2VudD4KICAgICAgICAgICAgPGRjOnRpdGxlPlRvcm1pIFRhYm9yPC9kYzp0aXRsZT4KICAgICAgICAgIDwvY2M6QWdlbnQ+CiAgICAgICAgPC9kYzpjcmVhdG9yPgogICAgICA8L2NjOldvcms+CiAgICA8L3JkZjpSREY+CiAgPC9tZXRhZGF0YT4KICA8ZwogICAgIGlua3NjYXBlOmdyb3VwbW9kZT0ibGF5ZXIiCiAgICAgaWQ9ImxheWVyMiIKICAgICBpbmtzY2FwZTpsYWJlbD0idGV4dCIKICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtODUuNTcxODA5LC00MDcuNjUyMTkpIj4KICAgIDxnCiAgICAgICBpZD0iZzMxMDEiPgogICAgICA8ZwogICAgICAgICBpZD0iZzMxMjkiCiAgICAgICAgIGlua3NjYXBlOmV4cG9ydC14ZHBpPSI5MCIKICAgICAgICAgaW5rc2NhcGU6ZXhwb3J0LXlkcGk9IjkwIj4KICAgICAgICA8ZwogICAgICAgICAgIGlkPSJnMzE2MSI+CiAgICAgICAgICA8ZwogICAgICAgICAgICAgaWQ9ImczMTU1Ij4KICAgICAgICAgICAgPHJlY3QKICAgICAgICAgICAgICAgc3R5bGU9Im9wYWNpdHk6MTtmaWxsOm5vbmU7ZmlsbC1vcGFjaXR5OjAuNDtmaWxsLXJ1bGU6ZXZlbm9kZDtzdHJva2U6bm9uZTtzdHJva2Utd2lkdGg6MC45OTk5OTk5NDtzdHJva2UtbGluZWNhcDpzcXVhcmU7c3Ryb2tlLWxpbmVqb2luOnJvdW5kO3N0cm9rZS1taXRlcmxpbWl0OjQ7c3Ryb2tlLWRhc2hhcnJheTowLjk5OTk5OTk0LCAwLjk5OTk5OTk0O3N0cm9rZS1kYXNob2Zmc2V0OjA7c3Ryb2tlLW9wYWNpdHk6MSIKICAgICAgICAgICAgICAgaWQ9InJlY3Q4MzM2IgogICAgICAgICAgICAgICB3aWR0aD0iNTUzLjU2MzYiCiAgICAgICAgICAgICAgIGhlaWdodD0iMjA0LjA1MDgzIgogICAgICAgICAgICAgICB4PSI0NS4wNzc2MzciCiAgICAgICAgICAgICAgIHk9IjMyOS44NzU2MSIKICAgICAgICAgICAgICAgaW5rc2NhcGU6ZXhwb3J0LXhkcGk9Ijk3LjQ3NTcxNiIKICAgICAgICAgICAgICAgaW5rc2NhcGU6ZXhwb3J0LXlkcGk9Ijk3LjQ3NTcxNiIgLz4KICAgICAgICAgIDwvZz4KICAgICAgICAgIDxnCiAgICAgICAgICAgICBpZD0iZzQ5NDQiPgogICAgICAgICAgICA8dGV4dAogICAgICAgICAgICAgICBpbmtzY2FwZTpleHBvcnQteWRwaT0iOTcuNDc1NzE2IgogICAgICAgICAgICAgICBpbmtzY2FwZTpleHBvcnQteGRwaT0iOTcuNDc1NzE2IgogICAgICAgICAgICAgICBzb2RpcG9kaTpsaW5lc3BhY2luZz0iMTAwJSIKICAgICAgICAgICAgICAgaWQ9InRleHQ0NDU1IgogICAgICAgICAgICAgICB5PSI0NTYuMzcyMTkiCiAgICAgICAgICAgICAgIHg9IjMyMC4wNDU3MiIKICAgICAgICAgICAgICAgc3R5bGU9ImZvbnQtc3R5bGU6bm9ybWFsO2ZvbnQtdmFyaWFudDpub3JtYWw7Zm9udC13ZWlnaHQ6NTAwO2ZvbnQtc3RyZXRjaDpub3JtYWw7Zm9udC1zaXplOjYwcHg7bGluZS1oZWlnaHQ6MTAwJTtmb250LWZhbWlseTpVYnVudHU7LWlua3NjYXBlLWZvbnQtc3BlY2lmaWNhdGlvbjonVWJ1bnR1IE1lZGl1bSc7dGV4dC1hbGlnbjpjZW50ZXI7bGV0dGVyLXNwYWNpbmc6MHB4O3dvcmQtc3BhY2luZzowcHg7d3JpdGluZy1tb2RlOmxyLXRiO3RleHQtYW5jaG9yOm1pZGRsZTtmaWxsOiM2YzVkNTM7ZmlsbC1vcGFjaXR5OjE7c3Ryb2tlOm5vbmUiCiAgICAgICAgICAgICAgIHhtbDpzcGFjZT0icHJlc2VydmUiCiAgICAgICAgICAgICAgIHRyYW5zZm9ybT0idHJhbnNsYXRlKDguMjAzMTI0OWUtOCwyLjM4MjgxMjVlLTYpIj48dHNwYW4KICAgICAgICAgICAgICAgICBzdHlsZT0iZm9udC1zdHlsZTpub3JtYWw7Zm9udC12YXJpYW50Om5vcm1hbDtmb250LXdlaWdodDpib2xkO2ZvbnQtc3RyZXRjaDpub3JtYWw7Zm9udC1mYW1pbHk6J0hhcmp1IDI3JzstaW5rc2NhcGUtZm9udC1zcGVjaWZpY2F0aW9uOidIYXJqdSAyNyBCb2xkJztmaWxsOiM2YzVkNTMiCiAgICAgICAgICAgICAgICAgeT0iNDU2LjM3MjE5IgogICAgICAgICAgICAgICAgIHg9IjMyMC4wNDU3MiIKICAgICAgICAgICAgICAgICBpZD0idHNwYW40NDU3IgogICAgICAgICAgICAgICAgIHNvZGlwb2RpOnJvbGU9ImxpbmUiPmhvbmV5ICAgICAgbWFya2V0PC90c3Bhbj48L3RleHQ+CiAgICAgICAgICAgIDxwYXRoCiAgICAgICAgICAgICAgIHNvZGlwb2RpOnR5cGU9InN0YXIiCiAgICAgICAgICAgICAgIHN0eWxlPSJjb2xvcjojMDAwMDAwO2Rpc3BsYXk6aW5saW5lO292ZXJmbG93OnZpc2libGU7dmlzaWJpbGl0eTp2aXNpYmxlO29wYWNpdHk6MC44MzU2NjQzNDtmaWxsOiNmZmNjMDA7ZmlsbC1vcGFjaXR5OjE7ZmlsbC1ydWxlOm5vbnplcm87c3Ryb2tlOm5vbmU7c3Ryb2tlLXdpZHRoOjE7bWFya2VyOm5vbmU7ZW5hYmxlLWJhY2tncm91bmQ6YWNjdW11bGF0ZSIKICAgICAgICAgICAgICAgaWQ9InBhdGg1OTU0IgogICAgICAgICAgICAgICBzb2RpcG9kaTpzaWRlcz0iNiIKICAgICAgICAgICAgICAgc29kaXBvZGk6Y3g9IjExNC4xNDcyNCIKICAgICAgICAgICAgICAgc29kaXBvZGk6Y3k9IjMzMi42Mjg0OCIKICAgICAgICAgICAgICAgc29kaXBvZGk6cjE9IjMxLjg4Nzg3NyIKICAgICAgICAgICAgICAgc29kaXBvZGk6cjI9IjI1LjA2NjIzOCIKICAgICAgICAgICAgICAgc29kaXBvZGk6YXJnMT0iMC41MTMyNTIyNyIKICAgICAgICAgICAgICAgc29kaXBvZGk6YXJnMj0iMS4wMzY4NTExIgogICAgICAgICAgICAgICBpbmtzY2FwZTpmbGF0c2lkZWQ9InRydWUiCiAgICAgICAgICAgICAgIGlua3NjYXBlOnJvdW5kZWQ9IjAiCiAgICAgICAgICAgICAgIGlua3NjYXBlOnJhbmRvbWl6ZWQ9IjAiCiAgICAgICAgICAgICAgIGQ9Im0gMTQxLjkyNjQzLDM0OC4yODU4NCAtMjcuNDQ5MjcsMTYuMjI4ODEgLTI3Ljc3OTE5MiwtMTUuNjU3MzcgLTAuMzI5OTIyLC0zMS44ODYxNiAyNy40NDkyNzQsLTE2LjIyODgxIDI3Ljc3OTE5LDE1LjY1NzM2IHoiCiAgICAgICAgICAgICAgIHRyYW5zZm9ybT0ibWF0cml4KDAuOTM2MzYzNjQsMCwwLDAuOTI4NzIwMDksMTk4LjUwNjM4LDEzMS43ODUyKSIgLz4KICAgICAgICAgIDwvZz4KICAgICAgICA8L2c+CiAgICAgIDwvZz4KICAgIDwvZz4KICA8L2c+Cjwvc3ZnPgo="
                        alt="Dispute Bills">
                </a>
            </div>
            <div id="navbar3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>


<h1 class="text-center">Example 4 - Tall Narrow Logo</h1>


<div class="container example4">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar4">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://honeymarket.com"><img style="	width: 64px;"
                        src="https://gitlab.com/honeymarket/honeymarket.com/uploads/5e7f77103018b0e348a72bfee733a308/HM16_aino_regular_s_icon_stroke.svg"
                        alt="Dispute Bills">
                </a>
            </div>
            <div id="navbar4" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>







<h1 class="text-center">Example 5 - Pull menu to right</h1>


<div class="container example5">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar5">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://honeymarket.com"><img style="	width: 64px;"
                        src="https://gitlab.com/honeymarket/honeymarket.com/uploads/5e7f77103018b0e348a72bfee733a308/HM16_aino_regular_s_icon_stroke.svg"
                        alt="Dispute Bills">honey market
                </a>
            </div>
            <div id="navbar5" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>

</div>



<h1 class="text-center">Example 6 - Background Image with hidden text</h1>


<nav class="navbar navbar-inverse navbar-static-top example6">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-hide" href="http://disputebills.com">Brand Text
            </a>
        </div>
        <div id="navbar6" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>








<h1 class="text-center">Example 7 - Center Navbar Brand / Logo On Mobile Display</h1>
<p class="text-center lead">
    Resize the browser width to view the effect!
</p>
<div class="container example-7">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar7">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://disputebills.com"><img
                        src="https://gitlab.com/honeymarket/honeymarket.com/uploads/5e7f77103018b0e348a72bfee733a308/HM16_aino_regular_s_icon_stroke.svg"
                        alt="Dispute Bills">
                </a>
            </div>



            <div id="navbar7" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="http://disputebills.com">Home</a></li>
                    <li><a href="#">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="http://disputebills.com">Home</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>


<br>

<h1 class="text-center">Example 8 - Center Navbar logo background</h1>
<p class="text-center lead">
    Resize the browser width to view the effect!
</p>

<nav class="navbar navbar-inverse navbar-static-top example-8">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar8">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-hide" href="#">Brand Text
            </a>
        </div>
        <div id="navbar8" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>






<br>

<h1 class="text-center">Example 9 - Version 2 Centered (Using flexbox)</h1>
<p class="text-center lead">
    Resize the browser width to view the effect!
</p>








<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar9">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="brand-centered">
                <a class="navbar-brand" href="http://disputebills.com"><img style="margin-right: 10px; padding: 0;"
                        src="https://gitlab.com/honeymarket/honeymarket.com/uploads/5e7f77103018b0e348a72bfee733a308/HM16_aino_regular_s_icon_stroke.svg"
                        alt="Dispute Bills">honey market
                </a>
            </div>

            <div id="navbar9" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>
</div>
