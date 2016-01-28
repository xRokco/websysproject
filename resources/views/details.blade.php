<?php
	use App\events;
	$ev = events::where('id', $event)->first();
?>
@extends('layouts.app')

@section('content')
    <!-- Navigation ( navigation.html ) -->
    
    <div class="container">
        <div class="section no-pad-bot" id="no-padding-top">
            <div class="row valign-wrapper" id="event">
                <!-- Event Image -->
                <div class="col center s3">
                    <img class="responsive-img" src="/img/event_images/{{ $ev->image }}" />
                </div>
                
                <!-- Event Description -->
                <div class="left-align col s5">
                    <h5>{{ $ev->name }}</h5>
                    <p class="light">Organiser<p>
                    <p>Curabitur varius tincidunt erat quis malesuada. Proin consequat massa nec tortor maximus, ac sollicitudin felis maximus...</p>
                </div>
                
                <!-- Event Details -->
                <div class="col s3" id="test">
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $ev->date }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $ev->venue}}, {{ $ev->city }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;99</p>
                    <a class="btn" href="print/{{ $event }}" >Print Ticket</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s6"><a href="#description">Description</a></li>
                    <li class="tab col s6"><a href="#location">Directions</a></li>
                  </ul>
                </div>
                <div id="description" class="col s12">
                    <br>
                    <h5 class="teal-text">{{ $ev->name }}</h5>
                    <h6 class="light">Organiser</h5>
                    <br>
                    <p id="no-margin-top">
                        Vivamus quam justo, posuere sit amet magna euismod, fermentum volutpat mauris. Pellentesque neque velit, finibus vel turpis pharetra, vulputate vehicula est. Morbi vitae tincidunt mi. Donec id lorem nunc. Ut varius erat non elit malesuada, quis rutrum ante pretium. Quisque aliquet pellentesque urna, at dictum sapien rhoncus nec. Donec ut magna vestibulum, cursus orci non, laoreet purus. Nunc sed suscipit nisl, congue aliquet nisi. Suspendisse volutpat enim eget malesuada auctor. Ut blandit mattis rutrum. Praesent facilisis ornare sem, eget sollicitudin orci consequat a. Curabitur congue porttitor laoreet. Vestibulum volutpat malesuada urna, eu laoreet orci egestas et. Etiam dictum, risus et pulvinar auctor, ligula nisl dapibus ipsum, eu efficitur sapien mi non ante. Nulla faucibus eget felis ut sagittis.
                    </p>
                    <p>
                        Vestibulum euismod tincidunt interdum. Nam sit amet aliquam ligula. Curabitur tristique nibh purus, sed iaculis nisl volutpat non. Etiam condimentum mollis felis sit amet finibus. Ut augue neque, aliquam sit amet massa nec, sodales consequat nisl. Quisque rhoncus maximus odio pulvinar tincidunt. Pellentesque suscipit ligula ipsum, id sodales justo hendrerit id. Nulla euismod elit consequat, semper mauris et, egestas libero. Cras ex justo, vulputate sollicitudin neque eu, pulvinar pulvinar arcu.
                    </p>                    
                    <p>
                        Nullam varius eros et consectetur rutrum. Sed rutrum at tellus et venenatis. Proin cursus eros sed augue convallis condimentum. Proin mollis sollicitudin tellus ut rhoncus. Nunc consectetur viverra arcu, vitae efficitur dui mattis in. Suspendisse nec maximus lectus. Suspendisse quis elit vitae turpis aliquam vehicula in sed urna. Morbi in dolor turpis.
                    </p>
                </div>
                <div id="location" class="col s12">
                    <div class="row center">
                    <br><br>
                        <iframe width="700" height="525" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/directions?origin={{ Auth::user()->direction }}&destination={{ $ev->venue }}, {{ $ev->city }}&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            @if(Auth::user()->admin==1)
				<h4 class="center">Delete this event by clicking <a href="/events/delete/{{ $event }}" > here </a></h4>
			@endif
            
        </div>
    </div>
@endsection
