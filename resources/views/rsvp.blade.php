@extends('layouts.app')

@section('content')
<div class="container">
		@if (Auth::check())
      		<h4 class="header center orange-text">Hi {{ Auth::user()->name }}, these are the events you are going to</h4>
      	@else
      		<h4 class="header center orange-text">Hi, check out our events, and login or register to see more details on them</h4>
      	@endif
</div>
<div class="container">
       
            @foreach ($rsvp as $event)
                <div class="row grey lighten-5 valign-wrapper" id="event">
                    <!-- Event Image -->
                    <div class="col center s3">
                        <img class="responsive-img circle" src='img/event_images/{{ $event->image }}' style='height:150px;width:150px;background-size:cover;' />
                    </div>
                    
                    <!-- Event Description -->
                    <div class="left-align col s5">
                        <h5>{{ $event->name }}</h5>
                        <p class="light">Organiser<p>
                        <p>Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus...</p>
                    </div>
                    
                    <!-- Event Details -->
                    <div class="col s3" id="test">
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $event->date }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;99</p>
                        <a class="btn teal lighten-1" href="events/details/{{ $event->id }}">View Event</a>
                    </div>
                </div>
            @endforeach

            <br>
        </div>
    </div>
@endsection