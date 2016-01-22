@extends('layouts.app')

@section('content')
<div class="container">
      <h4 class="header center orange-text">Hi {{ Auth::user()->name }}, please pick an event</h4>
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
			    echo "<a href='/print/" . $event->id . "' class='secondary-content'><i class='material-icons'>Details</i></a>";
			    echo "</li>";
			}
		?>
	</ul>
</div>
@endsection