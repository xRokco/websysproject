@extends('layouts.app')

@section('title', 'Home')
@section('content')
        
        <div class="container">
        
        <!-- Manage Your Events -->
        <div class="section" id="no-padding-bottom">
            <div class="row" id="no-margin-bottom">
            
                <div class="col s6">
                    <h1 class=" red-text text-darken-2 center">Make Ireland <br> Great Again</h1>
                    <br>
                    <h5 div="light center-align">Listen to a man who went to the Wharton School of Finance tell you how to fix all of Irelands problems and why Ireland needs a wall!</h5>
                    <br>
                    <div class="center">
                        <a class="red darken-3 btn-large" href="{{ url('/events') }}" ><i class="material-icons left">star</i>Browse Events<i class="material-icons right">star</i></a>
                    </div>
                </div>
                
                <div class="col s6">
                    <img class="responsive-img center" src="{{ url('img/trumpALT.png') }}">
                </div>
                
            </div>
        </div>
                <div class="divider"></div><h1 class="red-text text-darken-2 center-align">Upcoming events</h1><div class="divider"></div>
        <!-- Icon Section -->
        <div class="section">
            <div class="row">
                <div class="col s6">
                    <img class="materialboxed responsive-img" width="400" src="{{ url('img/event_images') }}/{{ $randEvent[0]->image }}">
                </div>            
                
                <div class="col s6 center">    
                    <h2 class="center-align red-text text-darken-2">{{ $randEvent[0]->name }}<br>{{ $randEvent[0]->city }}</h1>
                    <h5>{{ $randEvent[0]->information }}</h5>
                    <a class="btn red darken-3" href="{{ url('events/details') }}/{{ $randEvent[0]->id }}" style="margin-top: 20px">View Event</a>
                </div>
            </div>            
        </div>

        <div class="divider"></div>

        <div class="section">
            <div class="row">           
                <div class="col s6 center">    
                    <h2 class="center-align red-text text-darken-2">{{ $randEvent[1]->name }}<br>{{ $randEvent[1]->city }}</h1>
                    <h5>{{ $randEvent[1]->information }}</h5>
                    <a class="btn red darken-3" href="{{ url('events/details') }}/{{ $randEvent[1]->id }}" style="margin-top: 20px">View Event</a>
                </div>
                <div class="col s6">
                    <img class="materialboxed responsive-img" width="400" src="{{ url('img/event_images') }}/{{ $randEvent[1]->image }}">
                </div> 
            </div>            
        </div>
        
                
            
        <div class="section">
            <div class="row">
                
                <!-- Find Events -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center red-text text-darken-1"><i class="material-icons">search</i></h2>
                        <h5 class="center red-text text-lighten-1">Find Events</h5>
                        <p class="light">Find past and future European Trump events and information about how to get to these events. We also provide accommadation recommendations.</p>
                    </div>
                </div>

                <!-- List your Event -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center red-text text-darken-1"><i class="material-icons">list</i></h2>
                        <h5 class="center red-text text-lighten-1">List your Event</h5>
                        <p class="light">We know how much trump means to and thats why we are giving you the opportunity to host your very own Trump meetup event for free!</p>
                    </div>
                </div>

                <!-- Keep your Event Updated -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center red-text text-darken-1"><i class="material-icons">announcement</i></h2>
                        <h5 class="center red-text text-lighten-1">Keep your Event updated</h5>
                        <p class="light">Our user friendly website interface allowes you to easily edit your event details and keep your attendees up to date with the latest information.</p>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- Browse Events Button -->
            <div class="row center">
                <a class="btn-large red darken-2" href="{{ url('/events') }}">Upcoming Events</a>
            </div>
            
        </div>
    <br><br>

    <!-- Footer ( footer.html ) -->

    
  </div>
@endsection
