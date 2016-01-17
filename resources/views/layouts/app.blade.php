<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {!! MaterializeCSS::include_full() !!}

</head>
<body id="app-layout" class="amber lighten-5">
    <nav class="green" role="navigation">
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

    <footer class="page-footer green">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">{{ Auth::user() }}</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
