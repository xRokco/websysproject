@extends('layouts.app')

@section('title', 'Past Events')

@section('content') 

<!-- Navigation ( navigation.html ) -->
<!-- List of our past events -->
    <style type="text/css">
        .breadcrumb::before{
            margin-top:-5px !important;
        }
    </style>
    <div class="container">
        <div class="section no-pad-bot" id="index-banner">
            <div class="row" style="margin-top: 1em; margin-bottom: 0">
                <div class="col m6 s12">
                    <h4 class="light red-text hide-on-small-only" style="line-height:50%">Browse Past Events</h4>
                    <h4 class="light red-text center hide-on-med-and-up" style="line-height:1">Browse Past Events</h4>                
                </div>
                <div class="col m6 s12 right-align" style="padding-top: 1em">
                    <a href="{{ url('/events') }}" class="light red-text breadcrumb">Events</a>
                    <a href="#" class="red-text text-darken-1 breadcrumb">Past Events</a>
                </div>
            </div>
            <div class="divider"></div>
            <br>
            @foreach ($events as $event)
                <div class="row grey lighten-5" id="event">
                    <!-- Event Image -->
                    <div class="col center m3 s12">
                        <a href="{{ url('/events/details') }}/{{ $event->id }}"><img class="responsive-img circle" src='{{ $event->image }}' style='height:150px;width:150px;background-size:cover;' /></a>
                    </div>
                    
                    <!-- Event Description -->
                    <div class="left-align col m6 s5 offset-s1">
                        <h5>{{ $event->name }}</h5></a>
                        <p>{{ $event->information }}</p>
                    </div>
                    
                    <!-- Event Details -->
                    <div class="col m3 s5 offset-s1" id="test">
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $event->date->toFormattedDateString() }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
                        
                        @if(Auth::check())
                            <a class="btn red darken-3 lighten-1" href="{{ url('/past/pastDetails') }}/{{ $event->id }}">View Event</a>
                        @else
                            <a class="hide-on-med-and-down btn red darken-3 lighten-1" href="{{ url('/past/pastDetails') }}/{{ $event->id }}">Login to view</a>
                            <a class="hide-on-large-only btn red darken-3 lighten-1" href="{{ url('/past/pastDetails') }}/{{ $event->id }}">Login</a>
                                                @endif
                    </div>
                </div>
            @endforeach

            @if(!isset($events))
                <h4 class="red-text">No Past Events</h4>
            @endif

            <div class="center">
                @include('layouts.pagination', ['paginator' => $events])
            </div>
            <br>
        </div>
    </div>
@endsection
