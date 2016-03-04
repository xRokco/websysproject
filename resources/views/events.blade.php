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
			<div class="row" style="margin-bottom: 0em; margin-top: 0em">
				<div class="col m6 s12" style="padding-top: 1em">
					<h4 class="light red-text hide-on-small-only" style="line-height:50%">Browse Events</h4>
                    <h4 class="light red-text center hide-on-med-and-up" style="line-height:1">Browse Events</h4>
				</div>
				<div class="col m6 s12 right-align" style="padding-top: 1em">
					<a class="btn red darken-3 right" style="margin-bottom: 0.2em;" href="{{ url('/past') }}">Past Events</a>
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

			@if($events->count()==0)
				<h4 class="center red-text">No upcoming events</h4>
			@endif
			<div class="center"> 
				@include('layouts.pagination', ['paginator' => $events])
			</div>
			<br>
		</div>
	</div>
@endsection
