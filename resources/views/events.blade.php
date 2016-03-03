@extends('layouts.app')

@section('title', 'Events')

@section('content') 

	<style type="text/css">
		.breadcrumb::before{
            margin-top:-5px !important;
        }
	</style>
    <!-- List of all the events -->
	<div class="container">
		<div class="section no-pad-bot" id="index-banner">
			<div class="row valign-wrapper" style="margin-bottom: 0em; margin-top: 0em">
				<div class="col s7" style="padding-top: 1em">
					<h4 class="light red-text" style="line-height:50%">Browse Events</h4>
				</div>
				<div class="col s5" style="padding-top: 1em">
					<a class="btn red darken-3 right" style="margin-bottom: 0.2em; padding-left:1rem; padding-right:1rem" href="{{ url('/past') }}">Past Events</a>
				</div>
			</div>
			<div class="divider"></div>
			<br>
			@foreach ($events as $event)
				<div class="row grey lighten-5" id="event">
					<!-- Event Image -->
					<div class="col center m3 s12" style="margin-top:20px">
						<a href="{{ url('/events/details') }}/{{ $event->id }}"><img class="responsive-img circle" src="{{ url('/img/event_images') }}/{{ $event->image }}" style="height:150px;width:150px;background-size:cover;" /></a>
					</div>
					
					<!-- Event Description -->
					<div class="left-align col m6 s5 offset-s1">
						<br>
						<h5 class="light red-text text-darken-3">{{ $event->name }}</h5></a>
						<p >{{ $event->information }}</p>
					</div>
					
					<!-- Event Details -->
					<div class="col m3 s5 offset-s1" id="test" style="margin-bottom:20px;padding-right:0px">
						<p class="light valign-wrapper"><i class="material-icons">today</i>{{ $event->date->toFormattedDateString() }}</p>
						<p class="light valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
						<p class="light valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $event->price }}</p>
						@if(Auth::check())
							<a class="btn red darken-3 lighten-1" href="{{ url('/events/details') }}/{{ $event->id }}">View Event</a>
						@else
                            <a class="hide-on-med-and-down btn red darken-3 lighten-1" href="{{ url('/events/details') }}/{{ $event->id }}">Login to view</a>
                            <a class="hide-on-large-only btn red darken-3 lighten-1" href="{{ url('/events/details') }}/{{ $event->id }}">Login</a>
						@endif
					</div>
				</div>
			@endforeach
			<br>
		</div>
	</div>
@endsection
