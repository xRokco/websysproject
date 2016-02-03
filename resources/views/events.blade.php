@extends('layouts.app')

@section('content') 

<!-- Navigation ( navigation.html ) -->
    
    <div class="container">
        <div class="section no-pad-bot" id="index-banner">
            <h4 class="light teal-text">Browse Events</h5>
            <div class="divider"></div>
            <br>
            @foreach ($events as $event)
                <div class="row grey lighten-5 valign-wrapper" id="event">
                    <!-- Event Image -->
                    <div class="col center s3">
                        <img class="responsive-img circle" src='img/event_images/{{ $event->image }}' style='height:150px;width:150px;background-size:cover;' />
                    </div>
                    
                    <!-- Event Description -->
                    <div class="left-align col s5">
                        <h5>{{ $event->name }}</h5>
                        <p class="light">Organiser<p>
                        <p>{{ $event->information }}</p>
                    </div>
                    
                    <!-- Event Details -->
                    <div class="col s3" id="test">
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $event->date }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $event->price }}</p>
                        @if(Auth::check())
                            <a class="btn teal lighten-1" href="events/details/{{ $event->id }}">View Event</a>
                        @else
                            <a class="btn teal lighten-1" href="/login">Login to view</a>
                        @endif
                    </div>
                </div>
            @endforeach

            <br>
        </div>
    </div>
@endsection
