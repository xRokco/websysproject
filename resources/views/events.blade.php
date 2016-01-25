@extends('layouts.app')

@section('content')
<div class="container">
		@if (Auth::check())
      		<h4 class="header center orange-text">Hi {{ Auth::user()->name }}, check out our events below</h4>
      	@else
      		<h4 class="header center orange-text">Hi, check out our events, and login or register to see more details on them</h4>
      	@endif
</div>
<div class="container">
	<ul class="collection">
		<?php
			foreach ($events as $event) {
				echo "<li class='collection-item avatar'>";
			    echo "<img src='img/trump.jpg' alt='' class='circle'>";
			    echo "<span class='title'>" . $event->name . "</span>";
			    echo "<p>" . $event->venue . ", " . $event->city . "<br>";
			    echo $event->date;
			    echo "</p>";
			    if (Auth::check()) {
			    	echo "<a href='events/details/" . $event->id . "' class='secondary-content'><i>Details</i></a>";
			    } else {
			    	echo "<a href='login' class='secondary-content'><i>Login</i></a>";	
			    }
			    
			    echo "</li>";
			}
		?>
	</ul>
</div>
@endsection