<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
			<meta name="csrf-token" content="{{ Session::token() }}">
			<meta name="theme-color" content="#c62828">
			<link rel="manifest" href="{{ url('manifest.json') }}">
			<title>@yield('title') | Trump Events</title>
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

				.btn-container {
		          display: flex; 
		        }
		         
		        .btn-container > div {
		          width: auto; 
		        }
		         
		        .btn-container .btn, .btn-container .btn-large, .btn-container .btn-flat, .btn-container .btn-large {
		          display: block; 
		        }

		        .indicator {
		        	max-width: 49% !important;
		        }

		        input:focus {
				    border-bottom: 1px solid #c62828 !important;
				    box-shadow: 0 1px 0 0 #c62828 !important;
				}
				.picker__weekday-display{
					background-color: #c62828;
				}
			</style>

			<!-- CSS  -->
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<link href="{{ url('MaterialDesign-Webfont/css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />
			<!-- AddEvent -->
			<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
			
			<link rel="icon" type="image/png" href="{{ url('favicon.png') }}" />
		</head>
		<body>
    		<!--Nav-->
			<nav class="red darken-3" role="navigation">
				<div class="nav-wrapper container">
					<a id="logo-container" style="height:56px" href="{{ url('/') }}" class="brand-logo">
						<img class="responsive-img" width="50px" style="margin-top:5px" width="auto" src="{{ url('/img/logo.png') }}" />
						<span style="position:relative;bottom:12px;">TRUMP</span>
					</a>
					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						@if (Auth::check())     
							<!-- Dropdown Trigger -->
							<a style="margin:0px" class='dropdown-button btn white' href="#" data-beloworigin="true" data-hover='false' data-activates='dropdown1'><span class="red-text">{{ Auth::user()->name }}</span></a>
							<ul id='dropdown1' class='dropdown-content'>
								<li><a class="red-text" href="{{ url('/dash') }}">Dash</a></li>
								<li><a class="red-text" href="{{ url('/events') }}">Events</a></li>
								<?php
	            					$admin = DB::table('admins')
					                ->join('users', 'users.id', '=', 'admins.userid')
					                ->select('admins.*')
					                ->where(['userid' => Auth::user()->id])
					                ->distinct()
					                ->get();
								?>
								@if($admin)
									<li><a class="red-text" href="{{ url('/admin') }}">Admin</a></li>
								@else
									<li><a class="red-text" href="{{ url('/contact') }}">Contact us</a></li>
								@endif
								<li><a class="red-text" href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						@else
							<li><a href="{{ url('/login') }}">Login</a></li>
							<li><a href="{{ url('/events') }}">Events</a></li>
							<li><a href="{{ url('/register') }}">Register</a></li>
						@endif
	            	</ul>
		            <ul class="side-nav" id="nav-mobile">
						@if (Auth::check())     
							<!-- Dropdown Trigger -->
							<li><a class="red-text" href="{{ url('/dash') }}">Dash</a></li>
							<li><a class="red-text" href="{{ url('/events') }}">Events</a></li>
							<?php
	            				$admin = DB::table('admins')
				                ->join('users', 'users.id', '=', 'admins.userid')
				                ->select('admins.*')
				                ->where(['userid' => Auth::user()->id])
				                ->distinct()
				                ->get();
							?>
							@if($admin)
								<li><a class="red-text" href="{{ url('/admin') }}">Admin</a></li>
							@else
								<li><a class="red-text" href="{{ url('/contact') }}">Contact us</a></li>
							@endif
							<li><a class="red-text" href="{{ url('/logout') }}">Logout</a></li>
						@else
							<li><a class="red-text" href="{{ url('/login') }}">Login</a></li>
							<li><a class="red-text" href="{{ url('/events') }}">Events</a></li>
							<li><a class="red-text" href="{{ url('/register') }}">Register</a></li>
						@endif
		            </ul>
    			</div>
			</nav>

		<!--Page content-->
		<main>
        	@yield('content')
    	</main>

    	<!--Footer-->
		<footer class="page-footer red darken-3 hide-on-small-only">
        	<div class="footer-copyright">
        		<div class="container">
        			<div class="left">
        				<a class="white-text" target="_blank" href="https://www.donaldjtrump.com/">Offical Website</a>
        				<b>&middot;</b>
        				<a class="white-text" href="{{ url('/contact') }}">Contact Us</a>
        				<b>&middot;</b>
        				<a class="white-text" href="{{ url('/disclaimer') }}">Disclaimer</a>
        				<b>&middot;</b>
        				<a class="white-text" target="_blank" href="http://trumpdonald.org/">Surprise</a>
        			</div>
            		<a class="white-text right" href="{{ url('/about') }}">© Web Systems Group 2016</a>
        		</div>
        	</div>
    	</footer>

    	<footer class="page-footer hide-on-med-and-up red darken-3">
          <div class="container">
            <div class="row">
              <div class="col s12">
                <h5 class="white-text">External Links</h5>
                <ul>
					<li><a class="white-text" target="_blank" href="https://www.donaldjtrump.com/">Offical Website</a></li>
        			<li><a class="white-text" href="{{ url('/contact') }}">Contact Us</a></li>
        			<li><a class="white-text" href="{{ url('/disclaimer') }}">Disclaimer</a></li>
        			<li><a class="white-text" target="_blank" href="http://trumpdonald.org/">Surprise</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Created by 
            <a class="white-text" href="{{ url('/about') }}">Web Systems Group 2016</a>
            </div>
          </div>
        </footer>

    	<!--Mobile nav javascript-->
    	<script type="text/javascript">
    		$( document ).ready(function(){
    			$(".button-collapse").sideNav();
    		})
    	</script>
  	</body>
</html>
