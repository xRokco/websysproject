@extends('layouts.app')

@section('title', 'Events')

@section('content') 

<!-- Navigation ( navigation.html ) -->
    
    <div class="container">
        <div class="section no-pad-bot" id="index-banner">
            <a class="btn red darken-3 right" style="margin-top:15px" href="{{ url('/past') }}">Past Events</a>
            <h4 class="light red-text">Browse Events</h4>
            <div class="divider"></div>
            <br>
            @foreach ($events as $event)
                <div class="row grey lighten-5" id="event">
                    <!-- Event Image -->
                    <div class="col center m3 s12" style="margin-top:20px">
                        @if(Auth::check())
                            <a href="{{ url('/events/details') }}/{{ $event->id }}"><img class="responsive-img circle" src="{{ url('/img/event_images') }}/{{ $event->image }}" style="height:150px;width:150px;background-size:cover;" /></a>
                        @else
                            <a href="{{ url('/login') }}"><img class="responsive-img circle" src="{{ url('/img/event_images') }}/{{ $event->image }}" style="height:150px;width:150px;background-size:cover;" /></a>
                        @endif
                    </div>
                    
                    <!-- Event Description -->
                    <div class="left-align col m6 s5 offset-s1">
                        <h5>{{ $event->name }}</h5></a>
                        <p>{{ $event->information }}</p>
                    </div>
                    
                    <!-- Event Details -->
                    <div class="col m3 s5 offset-s1" id="test" style="margin-bottom:20px;padding-right:0px">
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $event->date }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $event->price }}</p>
                        @if(Auth::check())
                            <a class="btn red darken-3 lighten-1" href="{{ url('/events/details') }}/{{ $event->id }}">View Event</a>
                        @else
                            <a class="hide-on-med-and-down btn red darken-3 lighten-1" href="{{ url('/login') }}">Login to view</a>
                            <a class="hide-on-large-only btn red darken-3 lighten-1" href="{{ url('/login') }}">Login</a>
                        @endif
                    </div>
                </div>
            @endforeach
            <br>
        </div>
    </div>
@endsection
