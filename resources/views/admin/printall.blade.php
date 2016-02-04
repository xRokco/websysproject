{!! MaterializeCSS::include_full() !!}
<?php
	use App\events;
	$ev = events::where('id', $atnd)->first();

	$atns = DB::table('rsvp')
			->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('users.*')
            ->where('rsvp.eventid', '=', $atnd)
            ->get();
?>

@foreach($atns as $atn)
	<div style="border:1px solid black;width:350px;padding-left:5px;margin:5px;" >
		<h3 class="header teal-text">{{ $ev->name }}</h3>
		<img src="/img/event_images/{{ $ev->image }}" style="float:right;margin-right:20px;max-width:70px;" class="circle" >
		<p>{{ $atn->name }} {{ $atn->surname }}</p>
		<p>{{ $ev->date }}</p>
		<p>{{ $ev->venue }}, {{ $ev->city }}</p>
	</div>
@endforeach