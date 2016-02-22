{!! MaterializeCSS::include_full() !!}
@if($rsvp)
	<body onload="window.print()">
		<div style="border:1px solid black;width:350px;padding-left:15px">
			<h3 class="header red-text">{{ $ev->name }}</h3>
			<img src="{{ url('/img/event_images') }}/{{ $ev->image }}" style="float:right;margin-right:20px;max-width:70px;" class="circle" >
			<p>{{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
			<p>{{ $ev->date }}</p>
			<p>{{ $ev->venue }}, {{ $ev->city }}</p>
			<figure>
				<img style="margin-left:auto;margin-right:auto;display:block" alt="barcode" src="/barcode.php?text={{ $rsvp->code }}" />
				<figcaption class="center-align">{{ $rsvp->code }}</figcaption>
			</figure>
		</div>
	</body>
@else
	<h4 class="center">You are not attending this event</h4>
@endif