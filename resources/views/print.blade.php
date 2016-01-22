{!! MaterializeCSS::include_full() !!}
	<?php
		$events = \DB::table('events')->select('name', 'venue', 'city', 'date')->where('id', '=', $event)->get();

		foreach ($events as $ev) {
    		echo '<div style="border:1px solid black;width:350px" >';
			echo '<h3 class="header teal-text">' . $ev->name . ' Event</h3>';
			echo '<img src="/img/trump.jpg" style="float:right;margin-right:20px" class="circle" >';
			echo '<p>' . Auth::user()->name . ' ' .Auth::user()->surname . '</p>';
			echo '<p>' . $ev->date . '</p>';
			echo '<p>' . $ev->venue . ', ' . $ev->city . '</p>';
			echo '</div>';
		}	
?>


