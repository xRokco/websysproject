@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container">

	<!-- Our Team -->
	<div class="section no-pad-bot" id="index-banner">
		<br><br>
		<h1 class="header center red-text">Our Team</h1>
		<br><br>
		<div class="divider"></div>
		<br><br>
	</div>

	<!-- Matt -->
	<div class="grey lighten-5 card">
		<div class="col s12 offset-m2 l6 offset-l3">
			<div class="grey lighten-5">
				<div class="row valign-wrapper">
					<div class="col s2">
						<div class=" waves-effect waves-block waves-light">
							<img src="{{ url('/img/matt.jpg') }}" alt="" class="activator circle responsive-img">
						</div>
					</div>
					<div class="col s9">
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Matt Carrick<i class="material-icons right">expand_more</i></span>
							<p>Back End Developer</p>
							<p>3rd year Computer Science in UCC </p>
							<p><a href="#">matt@rokco.org</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-reveal">
			<span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_less</i></span>
			<p>Project Manager</p>
			<p>Back End Coder</p>
			<p>Database Admin</p>
		</div>
	</div>

	<!-- Darragh -->
	<div class="grey lighten-5 card">
		<div class="col s12  offset-m2 l6 offset-l3">
			<div class="grey lighten-5">
				<div class="row valign-wrapper">
					<div class="col s2">
						<div class=" waves-effect waves-block waves-light">
							<img src="{{ url('/img/darragh.jpg') }}" alt="" class="activator circle responsive-img">
						</div>
					</div>
					<div class="col s9">
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Darragh Drohan<i class="material-icons right">expand_more</i></span>
							<p>Front End Developer</p>
							<p>3rd year Computer Science in UCC </p>
							<p><a href="#">darraghddrohan@gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-reveal">
			<span class="card-title grey-text text-darken-4">More Info<i class="material-icons right">expand_less</i></span>
			<p>Actually supports Trump</p>
			<p>"Is a cool guy" - Conor Molloy</p>
			<p>Brilliant Cleaning Even On Whites</p>
		</div>
	</div>

	<!-- Conor -->
	<div class="grey lighten-5 card">
		<div class="col s12  offset-m2 l6 offset-l3">
			<div class="grey lighten-5">
				<div class="row valign-wrapper">
					<div class="col s2">
						<div class=" waves-effect waves-block waves-light">
							<img src="{{ url('/img/conor.png') }}" alt="" class="activator circle responsive-img">
						</div>
					</div>
					<div class="col s9">
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Conor Molloy<i class="material-icons right">expand_more</i></span>
							<p>Front End Developer</p>
							<p>3rd year Computer Science in UCC </p>
							<p><a href="#">conmolloy@gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-reveal">
			<span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_less</i></span>
			<p>Likes wheat bread from subway</p>
			<p>"Daz is a cool guy" - me</p>
			<p>Knows all the lyric for We Didnt Start The Fire</p>
		</div>
	</div>

	<!-- Kieran -->
	<div class="grey lighten-5 card">
		<div class="col s12  offset-m2 l6 offset-l3">
			<div class="grey lighten-5">
				<div class="row valign-wrapper">
					<div class="col s2">
						<div class=" waves-effect waves-block waves-light">
							<img src="{{ url('/img/kieran.jpg') }}" alt="" class="activator circle responsive-img">
						</div>
					</div>
					<div class="col s9">
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">Kieran O'Driscoll<i class="material-icons right">expand_more</i></span>
							<p>?</p>
							<p>3rd year Computer Science in UCC </p>
							<p><a href="#">kieranodriscoll9@gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-reveal">
			<span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_less</i></span>
			<p>Kieran O'Driscoll was born at a very young age.</p>
			<p>Clean the Bins at Trump HQ</p>
			<p>Voting for Ben Carson or Bernie Sanders</p>
		</div>
	</div>

	<!-- Peter -->
	<div class="grey lighten-5 card">
			<div class="col s12  offset-m2 l6 offset-l3">
				<div class="grey lighten-5">
					<div class="row valign-wrapper">
						<div class="col s2">
							<div class=" waves-effect waves-block waves-light">
								<img src="{{ url('/img/peter.jpg') }}" alt="" class="activator circle responsive-img">
							</div>
						</div>
						<div class="col s9">
							<div class="card-content">
								<span class="card-title activator grey-text text-darken-4">Peter Fitzgerald<i class="material-icons right">expand_more</i></span>
								<p>Back end developer</p>
								<p>3rd year Computer Science in UCC </p>
								<p><a href="#">petermfitz94@gmail.com</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="card-reveal">
			<span class="card-title grey-text text-darken-4">More info<i class="material-icons right">expand_less</i></span>
			<p>Back end developer.</p>
			<p>Junior Vice President</p>
			<p>Mobile commercial goods container reallocation technician.</p>
			<p>Teleprocessing Services Analyst B</p>
		</div>
	</div>
</div>
@endsection
