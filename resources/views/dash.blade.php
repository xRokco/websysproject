@extends('layouts.app')

@section('title', 'Dash')

@section('content')
<br><br>
<div class="container">
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s5"><a class="red-text" href="#description">Events</a></li>
                    <li class="tab col s5"><a class="red-text" href="#location">User Details</a></li>
                    <div class="indicator red" style="z-index:1"> </div>
                  </ul>
                </div>
                <div id="description" class="col s12">
                	<br><br>
                    	@if ($rsvp)
				            @foreach ($rsvp as $event)
				                <div class="row grey lighten-5 valign-wrapper" id="event">
				                    <!-- Event Image -->
				                    <div class="col center s3">
				                        <a href="events/details/{{ $event->id }}"><img class="responsive-img circle" src='img/event_images/{{ $event->image }}' style='height:150px;width:150px;background-size:cover;' /></a>
				                    </div>
				                    
				                    <!-- Event Description -->
				                    <div class="left-align col s5">
				                        <h5>{{ $event->name }}</h5>
				                        <p>{{ $event->information }}</p>
				                    </div>
				                    
				                    <!-- Event Details -->
				                    <div class="col s3" id="test">
				                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $event->date }}</p>
				                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
				                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $event->price }}</p>
				                        <a class="btn red darken-3" href="events/details/{{ $event->id }}">View Event</a>
				                    </div>
				                </div>
				            @endforeach
				        @else
				        	<h4 class="center red-text">You aren't attending any events yet. Checkout our <a class="red-text text-lighten-3" href="{{ url('events') }}" >events</a> page.</h4>
				        @endif
            			<br>
                </div>
                <div id="location" class="col s12">
                    <div class="row center">
                    	<div class="container light">
							<p>Name - {{ Auth::user()->name }}</p>
							<p>Surname - {{ Auth::user()->surname }}</p>
							<p>E-mail Address - {{ Auth::user()->email }}</p>
							<p>Travelling Address - {{ Auth::user()->direction }}</p>
							<p>Edit your user details <a href="{{ url('/account') }}" >here</a></p>
						</div>
                    </div>
                    <div class="center">
    					<iframe width="600" height="525" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q={{ Auth::user()->direction }}&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg" allowfullscreen></iframe>
    					<br><br>
					</div>
                </div>
            </div>
        </div>
    </div>
  

@endsection