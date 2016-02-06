<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
			<title>Home Page</title>
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

			<!-- CSS  -->
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
			<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
			<!-- AddEvent -->
			<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
		</head>
		<body>
    
			<nav class="red darken-3" role="navigation">
				<div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo"><img class="responsive-img" src="/img/logo.png">TRUMP</a>
				<ul class="right hide-on-med-and-down">
					@if (Auth::check())     
						<!-- Dropdown Trigger -->
			<a style="margin:0px" class='dropdown-button btn transparent' href='#' data-beloworigin="true" data-hover='false' data-activates='dropdown1'>{{ Auth::user()->name }}</a>
						<ul id='dropdown1' class='dropdown-content'>
							<li><a href="{{ url('/dash') }}">Dash</a></li>
							<li><a href="{{ url('/events') }}">Events</a></li>
							@if(Auth::user()->admin==1)
								<li><a href="/admin">Admin</a></li>
							@endif
							<li><a href="{{ url('/logout') }}">Logout</a></li>
						</ul>
					@else
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/events') }}">Events</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					@endif
            </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

</body>
</html>
<main>
        @yield('content')
    </main>

     <footer class="page-footer red darken-3">
          <div class="footer-copyright">
            <div class="container">
            <a class="grey-text text-lighten-4 right" href="{{ url('/about') }}">© Web Systems Group 2016</a>
            </div>
          </div>
    </footer>
  </body>
</html>
