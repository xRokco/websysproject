{!! MaterializeCSS::include_full() !!}
	<head>
		<title>Print all | Trump Events</title>
	</head>
@if($atns)
	<body onload="window.print()">
		@foreach($atns as $atn)
			<div style="border:1px solid black;width:350px;padding-left:5px;margin:5px;margin-bottom:55px" >
				<h3 class="header red-text">{{ $ev->name }}</h3>
				<img src="{{ $ev->image }}" style="float:right;margin-right:20px;max-width:70px;" class="circle" >
				<p>{{ $atn->name }} {{ $atn->surname }}</p>
				<p>{{ $ev->date }}</p>
				<p>{{ $ev->venue }}, {{ $ev->city }}</p>
				<figure>
					<img style="margin-left:auto;margin-right:auto;display:block" alt="barcode" src="{{ url('/barcode.php?text=') }}{{ $atn->code }}" />
					<figcaption class="center-align">{{ $atn->code }}</figcaption>
				</figure>
			</div>
		@endforeach
	</body>
@else
	<h4 class="center">No attendees yet</h4>
@endif