@extends('layouts.app')

@section('content')
<div class="container">
      <h4 class="header center orange-text">Hi {{ Auth::user()->name }}, here's some details on this event.</h4>
</div>

	<?php
		$events = \DB::table('events')->select('name', 'venue', 'city', 'date')->where('id', '=', $event)->get();
		foreach($events as $ev){
			echo '<p class="center">It will be held in ' . $ev->venue . ', ' . $ev->city . ' at the date ' . $ev->date . '.</p>';
			echo '<div class="container"><h2 class="header center orange-text"><iframe width="700" height="525" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/directions?origin=' . Auth::user()->direction . ' &destination= ' . $ev->venue . ", " . $ev->city . '&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg" allowfullscreen></iframe></h2>
      <br><br>
</div>';

		echo '<h4 class="center">Print your ticket <a href="print/' . $event .'" > here </a></h4>';
		}	
	?>
	

@endsection