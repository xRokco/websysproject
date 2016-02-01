<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!! MaterializeCSS::include_full() !!}

    <style type="text/css">
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>

</head>
<body id="app-layout" class="lighten-5">
    <nav class="teal" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">WebSysProject</a>
            <ul class="right hide-on-med-and-down">
                @if (Auth::check())     
                    <!-- Dropdown Trigger -->
                    <a style="margin:0px" class='dropdown-button btn transparent' href='#' data-beloworigin="true" data-hover='false' data-activates='dropdown1'>{{ Auth::user()->name }}</a>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="{{ url('/dash') }}">Dash</a></li>
						<li><a href="{{ url('/events') }}">Events</a></li>
                        @if(Auth::user()->admin==1)
                            <li><a href="/create">New event</a></li>
                        @endif
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/events') }}">Events</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>
	
	
    <main>
        @yield('content')
    </main>

     <footer class="page-footer teal">
          <div class="footer-copyright">
            <div class="container">
            Made by <a class="grey-text text-lighten-4" href="http://materializecss.com">Materialize</a>
            <a class="grey-text text-lighten-4 right" href="{{ url('/about') }}">© Web Systems Group 2016</a>
            {{ Auth::guest() }}
            </div>
          </div>
    </footer>
  </body>
</html>
