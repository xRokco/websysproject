@extends('layouts.app')

@section('title', ' Past Event Details')
@section('content')
    <!-- Navigation ( navigation.html ) -->
    <style>
        .indicator {
            width:49% !important;
        }
    </style>
    <script src="/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/sweetalert/dist/sweetalert.css">
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
                    <p>{{ $ev->information }}</p>
                </div>
                
                <!-- Event Details -->
                <div class="col s3" id="test">
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $ev->date }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $ev->venue}}, {{ $ev->city }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons"></i>Attendence: {{ $count }}</p>
            <!-- Check if clicked attend already -->
            
                    
                </div>
            </div>

                
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s6"><a class="red-text" href="#description">Description</a></li>
                    <li class="tab col s6"><a id="locationbutton" class="red-text" href="#location">Event Media</a></li>
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
                    @foreach ($videos as $video)
                        <div class="row center">
                            <br/>
                            <table class="col m3 s7 offset-m1 offset-s4">
                                <tr><td>{{ $ev->name }}</td></tr>
                                <tr><td>{{ $ev->venue }}</td></tr>
                                <tr><td>Submitted by user: {{ $video->name }}</td></tr>
                            </table>
                            <object width= "425" height="344"><param name="movie" value="https://www.youtube.com/v/{{ $video->link }}&ap=%2526fmt%3D18" /><param name="allowFullScreen" value="true" /><embed src="https://www.youtube.com/v/{{ $video->link }}&ap=%2526fmt%3D18&showinfo=0&controls=0" type="application/x-shockwave-flash" allowfullscreen="false" width="593" height="315"></embed></object>

                            <br/>
                        </div>
                        <div class="divider"></div>
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
@endsection
