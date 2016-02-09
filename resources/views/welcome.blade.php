@extends('layouts.app')


@section('content')
        
        <div class="container">
        
        <!-- Manage Your Events -->
        <div class="section" id="no-padding-bottom">
            <div class="row" id="no-margin-bottom">
            
                <div class="col s6">
                    <h1 class=" red-text text-darken-2 center">Make Ireland <br> Great Again</h1>
                    <br>
                    <h5 div="light center-align">Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.</h5>
                    <br>
                    <div class="center">
                        <!--<img class="responsive-img center" src="/img/button.png">-->
                        <a class="red darken-3 waves-effect waves-light btn-large" href="/events" ><i class="material-icons left">star</i>Browse Events<i class="material-icons right">star</i></a>
                    </div>
                </div>
                
                <div class="col s6">
                    <img class="responsive-img center" src="/img/trumpALT.png">
                </div>
                
            </div>
        </div>
                <div class="divider"></div><h1 class="red-text text-darken-2 center-align">Upcoming events</h1><div class="divider"></div>
        <!-- Icon Section -->
        <div class="section">
            <div class="row">
                <div class="col s6">
                    <img class="materialboxed responsive-img" src="img/event_images/{{ $randEvent[0]->image }}">
                </div>            
                
                <div class="col s6 center">    
                    <h2 class="center-align red-text text-darken-2">{{ $randEvent[0]->name }}<br>{{ $randEvent[0]->city }}</h1>
                    <h5>{{ $randEvent[0]->information }}</h5>FF
                    <a class="btn red darken-3" href="/events/details/{{ $randEvent[0]->id }}" style="margin-top: 20px">View Event</a>
                </div>
            </div>            
        </div>

        <div class="section">
            <div class="row">           
                <div class="col s6 center">    
                    <h2 class="center-align red-text text-darken-2">{{ $randEvent[1]->name }}<br>{{ $randEvent[1]->city }}</h1>
                    <h5>{{ $randEvent[1]->information }}</h5>
                    <a class="btn red darken-3" href="/events/details/{{ $randEvent[1]->id }}" style="margin-top: 20px">View Event</a>
                </div>
                <div class="col s6">
                    <img class="materialboxed responsive-img" src="img/event_images/{{ $randEvent[1]->image }}">
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
                        <p class="light">Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus. Maecenas congue ligula velit, eu sollicitudin est fermentum eu.</p>
                    </div>
                </div>

                <!-- List your Event -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center red-text text-darken-1"><i class="material-icons">list</i></h2>
                        <h5 class="center red-text text-lighten-1">List your Event</h5>
                        <p class="light">Etiam non aliquet lacus, quis efficitur quam. Nam placerat odio ut orci auctor, ullamcorper pharetra arcu varius.</p>
                    </div>
                </div>

                <!-- Keep your Event Updated -->
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center red-text text-darken-1"><i class="material-icons">announcement</i></h2>
                        <h5 class="center red-text text-lighten-1">Keep your Event updated</h5>
                        <p class="light">Maecenas vel purus a orci imperdiet rutrum. Ut non mattis dolor, non ultricies tortor. Morbi volutpat consequat hendrerit.</p>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- Browse Events Button -->
            <div class="row center">
                <a class="btn-large red darken-2" href="events">Upcoming Events</a>
            </div>
            
        </div>
    <br><br>

    <!-- Footer ( footer.html ) -->

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  </div>
@endsection
