@extends('layouts.app')

@section('content')
<?php
use App\events;
?>
<div class="container">
		@if (Auth::check())
      		<h4 class="header center orange-text">Hi {{ Auth::user()->name }}, check out our events below</h4>
      	@else
      		<h4 class="header center orange-text">Hi, check out our events, and login or register to see more details on them</h4>
      	@endif
</div>
<div class="container">
	<ul class="collection">
		@foreach ($events as $event)
			<li class='collection-item avatar'>
		    	<img src='img/trump.jpg' alt='' class='circle'>
		    	<span class='title'>{{ $event->name }}</span>
			    <p>{{ $event->venue }}, {{ $event->city }}<br>
			    {{ $event->date }}
			    </p>
			    @if (Auth::check())
			    	<a href='events/details/{{ $event->id }}' class='secondary-content'><i>Details</i></a>
			    @else
			    	<a href='login' class='secondary-content'><i>Login</i></a>	
			    @endif
		    </li>
		@endforeach
	</ul>
</div>
@endsection