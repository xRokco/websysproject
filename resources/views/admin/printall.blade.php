{!! MaterializeCSS::include_full() !!}
<?php
	use App\events;
	$ev = events::where('id', $atnd)->first();

	$atns = DB::table('rsvp')
			->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('*')
            ->where('rsvp.eventid', '=', $atnd)
            ->get();

?>
@if($atns)
	@foreach($atns as $atn)
		<div style="border:1px solid black;width:350px;padding-left:5px;margin:5px;" >
			<h3 class="header red-text">{{ $ev->name }}</h3>
			<img src="/img/event_images/{{ $ev->image }}" style="float:right;margin-right:20px;max-width:70px;" class="circle" >
			<p>{{ $atn->name }} {{ $atn->surname }}</p>
			<p>{{ $ev->date }}</p>
			<p>{{ $ev->venue }}, {{ $ev->city }}</p>
			<figure>
				<img style="margin-left:auto;margin-right:auto;display:block" alt="barcode" src="/barcode.php?text={{ $atn->code }}" />
				<figcaption class="center-align">{{ $atn->code }}</figcaption>
			</figure>
		</div>
	@endforeach
@else
	<h4 class="center">No attendees yet</h4>
@endif