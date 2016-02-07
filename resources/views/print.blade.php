{!! MaterializeCSS::include_full() !!}
<?php
	use App\events;
	$ev = events::where('id', $event)->first();
	$rsvp = \DB::table('events')
            ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('events.*')
            ->where(['userid' => \Auth::user()->id, 'eventid' => $event])
            ->distinct()
            ->get();
?>
@if($rsvp)
	<div style="border:1px solid black;width:350px;padding-left:5px" >
		<h3 class="header red-text">{{ $ev->name }}</h3>
		<img src="/img/event_images/{{ $ev->image }}" style="float:right;margin-right:20px;max-width:70px;" class="circle" >
		<p>{{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
		<p>{{ $ev->date }}</p>
		<p>{{ $ev->venue }}, {{ $ev->city }}</p>
	</div>
@else
	<h4 class="center">You are not attending this event</h4>
@endif