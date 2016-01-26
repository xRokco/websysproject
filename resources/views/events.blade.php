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
                        <img class="responsive-img" src='img/event_images/{{ $event->image }}' />
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
            
            <!-- Page Numbers -->
            <div class="container">
                <ul class="pagination center">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons teal-text">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer ( footer.html ) -->

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
@endsection
