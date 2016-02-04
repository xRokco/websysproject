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
		</head>
		<body>
    
			<nav class="red darken-2" role="navigation">
				<div class="nav-wrapper container"><a id="logo-container" href="index.html" class="brand-logo">TRUMP</a>
				<ul class="right hide-on-med-and-down">
					@if (Auth::check())     
						<!-- Dropdown Trigger -->
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
