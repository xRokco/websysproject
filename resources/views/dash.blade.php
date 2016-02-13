@extends('layouts.app')

@section('title', 'Dash')

@section('content')
<style type="text/css">
	#map_wrapper {
    	height: 400px;
	}

	#map_canvas {
    	height: 400px;
	}

	.info_content h3{
		font-size: 1.5em !important;
	}
</style>
<script type="text/javascript">
	jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
    <?php
    	foreach ($rsvp as $event) {
    		$address_to_coordinates = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $event->venue . ", " . $event->city . "&sensor=true";
		    $xml = simplexml_load_file($address_to_coordinates) or die("url not loading");
		    $status = $xml->status;

		    if ($status=="OK") {
		        $Lat = $xml->result->geometry->location->lat;
		        $Lon = $xml->result->geometry->location->lng;
		        $LatLng = "$Lat,$Lon";
		    }

	        echo "['" . $event->venue . ", " . $event->city . "', " . $LatLng . "],";
    	}
		
		$address_to_coordinates2 = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . Auth::user()->direction . "&sensor=true";
	    $xml2 = simplexml_load_file($address_to_coordinates2) or die("url not loading");
	    $status2 = $xml2->status;

	    if ($status2=="OK") {
	        $Lat2 = $xml2->result->geometry->location->lat;
	        $Lon2 = $xml2->result->geometry->location->lng;
	        $LatLng2 = "$Lat2,$Lon2";
	    }    
    	echo "['" . Auth::user()->direction . "', " . $LatLng2 . "]";
    ?>
    ];
                        
    // Info Window Content
    var infoWindowContent = [
    <?php
        foreach ($rsvp as $event) {
        	echo "['<div class=\"info_content\">' + '<h3>" . $event->venue . ", " . $event->city . "</h3>' + '<p><a href=\"/events/details/" . $event->id . "#location\">" . $event->name . "</a></p>' + '</div>'],";
        }
    ?>
    	['<div class="info_content">' + '<h3>{{Auth::user()->direction}}</h3>' + '<p>Your address</p>' + '</div>']
    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(5);
        google.maps.event.removeListener(boundsListener);
    });
}
</script>
<script type="text/javascript">
    function display () {
        setTimeout(function(){ initialize(); }, 300);
    }
</script>
<br><br>
<div class="container">
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s6"><a class="red-text" href="#description">My Events</a></li>
                    <li class="tab col s6"><a class="red-text" onclick="display()" href="#location">User Details</a></li>
                    <div class="indicator red" style="z-index:1"> </div>
                  </ul>
                </div>
                <div id="description" class="col s12">
                	<br><br>
                    	@if ($rsvp)
				            @foreach ($rsvp as $event)
				                <div class="row grey lighten-5 valign-wrapper" id="event">
				                    <!-- Event Image -->
				                    <div class="col center s3">
				                        <a href="events/details/{{ $event->id }}"><img class="responsive-img circle" src='img/event_images/{{ $event->image }}' style='height:150px;width:150px;background-size:cover;' /></a>
				                    </div>
				                    
				                    <!-- Event Description -->
				                    <div class="left-align col s5">
				                        <h5>{{ $event->name }}</h5>
				                        <p>{{ $event->information }}</p>
				                    </div>
				                    
				                    <!-- Event Details -->
				                    <div class="col s3" id="test">
				                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $event->date }}</p>
				                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
				                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $event->price }}</p>
				                        <a class="btn red darken-3" href="events/details/{{ $event->id }}">View Event</a>
				                    </div>
				                </div>
				            @endforeach
				        @else
				        	<h4 class="center red-text">You aren't attending any events yet. Checkout our <a class="red-text text-lighten-3" href="{{ url('events') }}" >events</a> page.</h4>
				        @endif
            			<br>
                </div>
                <div id="location" class="col s12">
                    <div class="row center">
                    	<div class="container light">
							<p>Name - {{ Auth::user()->name }}</p>
							<p>Surname - {{ Auth::user()->surname }}</p>
							<p>E-mail Address - {{ Auth::user()->email }}</p>
							<p>Travelling Address - {{ Auth::user()->direction }}</p>
							<p>Edit your user details <a href="{{ url('/account') }}" >here</a></p>
						</div>
                    </div>
                    <div class="center">
                        <br><br>
    					<div id="map_wrapper">
						    <div id="map_canvas" class="mapping"></div>
						</div> 
					</div>
                </div>
            </div>
        </div>
    </div>
  

@endsection