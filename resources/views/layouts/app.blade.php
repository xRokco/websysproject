<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {!! MaterializeCSS::include_full() !!}

</head>
<body id="app-layout" class="lighten-5">
    <nav class="teal" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">WebSysProject</a>
            <ul class="right">
                @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                            <!-- Dropdown Trigger -->
                            <a style="margin:0px" class='dropdown-button btn transparent' href='#' data-beloworigin="true" data-hover='false' data-activates='dropdown1'>{{ Auth::user()->name }}</a>

                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                    @endif
            </ul>
        </div>
    </nav>
    
    @yield('content')

     <footer class="page-footer teal">
          <div class="footer-copyright">
            <div class="container">
            Made by <a class="grey-text text-lighten-4" href="http://materializecss.com">Materialize</a>
            <a class="grey-text text-lighten-4 right" href="#!">© Web Systems Group 2016</a>
            </div>
          </div>
    </footer>

    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
