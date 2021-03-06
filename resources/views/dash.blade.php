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

    .indicator {
        width:48% !important;
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
    @foreach ($rsvp as $event)
        ['<div class="info_content">' + '<h3>{{ $event->venue }}, {{ $event->city }}</h3>' + '<p><a href="{{ url('/events/details') }}/{{ $event->id }}#location">{{ $event->name }}</a></p>' + '</div>'],
    @endforeach
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
        this.setZoom(4);
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
<!-- Event content -->
<div class="container">
	<!--Tab selection-->
    <div class="row">
        <div class="col s12">
        	<ul class="tabs">
            	<li class="tab col s6"><a class="red-text" href="#events">My Events</a></li>
            	<li class="tab col s6"><a class="red-text" onclick="display()" href="#location">User Details</a></li>
            	<div class="indicator red" style="z-index:1"> </div>
          	</ul>
        </div>
    </div>

    <!--My Events tab-->
    <div id="events" class="col s12">
    	<!--Upcoming events section-->
    	<div class="row">
        	<br><br>
            @foreach ($rsvp as $event)
                <div class="row grey lighten-5" id="event">
                    <!-- Event Image -->
                    <div class="col center m3 s12" style="margin-top:20px">
                        <a href="{{ url('events/details') }}/{{ $event->id }}"><img class="responsive-img circle" src="{{ url('img/event_images') }}/{{ $event->image }}" style="height:150px;width:150px;background-size:cover;" /></a>
                    </div>
                    
                    <!-- Event Description -->
                    <div class="left-align col m5 s5 offset-s1">
                        <h5>{{ $event->name }}</h5>
                        <p>{{ $event->information }}</p>
                    </div>
                    
                    <!-- Event Details -->
                    <div class="col m3 s5 offset-s1" style="margin-bottom:20px;">
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $event->date->toFormattedDateString() }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $event->venue }}, {{ $event->city }}</p>
                        <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $event->price }}</p>
                        <a class="btn red darken-3" href="{{ url('/events/details') }}/{{ $event->id }}">View Event</a>
                    </div>
                </div>
            @endforeach

	        @if($rsvp->count()==0)
	        	<div class="col s3 m3">
	        		<br>
	        		<i class="medium material-icons right red-text">info_outline</i>
	        	</div>
	        	<div class="col s9 m9">
	        		<h4 class="red-text light">You aren't attending any events yet. Checkout our <a class="blue-text text-darken-3" href="{{ url('/events') }}" >events</a> page.</h4>
	        	</div>	
	        @endif
		</div>

		<!--Past event section-->
		<div class="row"> 
			@if ($pastrsvp->count()>0)
				<div class="divider"></div>
		    	<h4 class="red-text center light">Past events you attended</h4>
		    	@foreach ($pastrsvp as $pastevent)
		        	<div class="row grey lighten-5" id="event">
		            	<!-- Event Image -->
		            	<div class="col center m3 s12" style="margin-top:20px">
		               		<a href="{{ url('events/details') }}/{{ $pastevent->id }}"><img class="responsive-img circle" src="{{ url('img/event_images') }}/{{ $pastevent->image }}" style="height:150px;width:150px;background-size:cover;" /></a>
		            	</div>
		            
		            	<!-- Event Description -->
		            	<div class="left-align col m5 s5 offset-s1">
		                	<h5>{{ $pastevent->name }}</h5>
		                	<p>{{ $pastevent->information }}</p>
		            	</div>
		            
		            	<!-- Event Details -->
		            	<div class="col m3 s5 offset-s1" style="margin-bottom:20px;">
		                	<p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $pastevent->date->toFormattedDateString() }}</p>
		                	<p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $pastevent->venue }}, {{ $pastevent->city }}</p>
		                	<p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $pastevent->price }}</p>
		                	<a class="btn red darken-3" href="{{ url('/past/pastDetails') }}/{{ $pastevent->id }}">View Event</a>
		            	</div>
		        	</div>
		    	@endforeach
			@endif
		</div>
	</div>
    <br>
        
	<!-- User details tab-->
	<div id="location" class="col s12">
		<br>
		<!--Table of user details-->
		<div class="row center">
	   		<div class="col s12 m6">
	   			<br>
	   			<h5 class="left red-text text-darken-1" style="margin-bottom: 0; padding-bottom: 0.5em;">Your details</h5>
				<a style="padding-top: 1em;" class="light grey-text valign-wrapper right" href="{{ url('/account') }}"><i class="material-icons" style="padding-right: 0.3em">settings</i>Edit details </a>
				<table style="border-bottom:1px solid lightgrey; border-top:1px solid lightgrey;">
					<tr>
						<th data-field="id" class="red-text light text-darken-1">Name</th>
						<td>{{ Auth::user()->name }} {{ Auth::user()->surname }}</td>
					</tr>
					<tr>
						<th data-field="name" class="red-text light text-darken-1">E-mail Address</th>
						<td>{{ Auth::user()->email }}</td>
					</tr>
					<tr>
						<th data-field="price" class="red-text light text-darken-1">Travelling Address</th>
						<td>{{ Auth::user()->direction }}</td>
					</tr>
					@if($admin)
						<tr>
							<th data-field="price" class="red-text light text-darken-1">Is Admin</th>
							<td>Yes</td>
						</tr>
					@endif
				</table>
			</div>
			<!--Map-->
			<div class="center col s12 m6 right">
				<br>
				<div id="map_wrapper">
					<div id="map_canvas" class="mapping"></div>
				</div> 
			</div>
		</div>
	</div>
</div>
@endsection