<?php
	use App\events;
	$ev = events::where('id', $event)->first();
    $rsvp = \DB::table('events')
            ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('events.*')
            ->where(['userid' => \Auth::user()->id, 'eventid' => $event])
            ->distinct()
            ->get();
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
                    <p>{{ $ev->information }}</p>
                </div>
                
                <!-- Event Details -->
                <div class="col s3" id="test">
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $ev->date }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $ev->venue}}, {{ $ev->city }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;99</p>
            <!-- Check if clicked attend already -->
            @if($rsvp)
                <!-- Add to Calendar API -->
                <div title="Add to Calendar" class="addeventatc">
                    Add to Calendar
                    <span class="start">{{ $ev->date }} {{ $ev->start_time }}</span>
                    <span class="end">{{ $ev->date }} {{ $ev->end_time }}</span>
                    <span class="title">{{ $ev->name }}</span>
                    <span class="description">{{ $ev->information }}</span>
                    <span class="location">{{ $ev->venue}}, {{ $ev->city }}</span>
                    <span class="date_format">MM/DD/YYYY</span>
                </div>
                <a class="btn red darken-3" href="print/{{ $event }}">Print Ticket</a>
                <a class="btn red darken-3" href="unattend/{{ $event }}">Unattend Event</a>
                @else
                    <a class="btn red darken-3" href="attend/{{ $event }}">Attend Event</a>
            @endif
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s6"><a class="red-text" href="#description">Description</a></li>
                    <li class="tab col s6"><a class="red-text" href="#location">Directions</a></li>
                    <div class="indicator red" style="z-index:1"> </div>
                  </ul>
                </div>
                <div id="description" class="col s12">
                    <br>
                    <p id="no-margin-top">
                        {{ $ev->description }}
                    </p>
                </div>
                <div id="location" class="col s12">
                    <div class="row center">
                    <br><br>
                        <iframe width="700" height="525" frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/directions?origin={{ Auth::user()->direction }}&destination={{ $ev->venue }}, {{ $ev->city }}&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg" allowfullscreen></iframe>
                    </div>

                    <h5 class="center">Here's a couple of hotels within a couple of kilometers of the venue</h5>

                    <table class="highlight">
                        <thead>
                            <th data-field="id">Hotel</th>
                            <th data-field="address">Address</th>
                            <th data-field="phone">Phone Number</th>
                            <th data-field="rating">Rating</th>
                        </thead>
                        <tbody>
                            <?php
                                $address_to_coordinates = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $ev->venue . ", " . $ev->city . "&sensor=true";
                                $xml = simplexml_load_file($address_to_coordinates) or die("url not loading");
                                $status = $xml->status;

                                if ($status=="OK") {
                                    $Lat = $xml->result->geometry->location->lat;
                                    $Lon = $xml->result->geometry->location->lng;
                                    $LatLng = "$Lat,$Lon";
                                }

                                $place_id_url = "https://maps.googleapis.com/maps/api/place/nearbysearch/xml?location=" . $LatLng . "&radius=1500&types=lodging&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg";
                                $xml2 = simplexml_load_file($place_id_url) or die("url not loading");
                                $status2 = $xml2->status;

                                if($status2=="OK") {
                                    
                                    for($i=0; $i<5; $i++) {
                                        $place_id = $xml2->result[$i]->place_id;

                                        $place_details_url = "https://maps.googleapis.com/maps/api/place/details/xml?placeid=" . $place_id . "&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg";
                                        $xml3 = simplexml_load_file($place_details_url) or die("url not loading");
                                        $status3 = $xml3->status;

                                        if($status3=="OK"){
                                            $place_name = $xml3->result->name;
                                            $place_website = $xml3->result->website;
                                            $place_rating = $xml3->result->rating;
                                            $place_address = $xml3->result->formatted_address;
                                            $place_phone = $xml3->result->formatted_phone_number;

                                            echo "<tr>";
                                            echo "<td><a href='" . $place_website . "'>" . $place_name . "</a></td>";
                                            echo "<td>" . $place_address . "</td>";
                                            echo "<td>" . $place_phone . "</td>";
                                            echo "<td>" . $place_rating . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
@endsection
