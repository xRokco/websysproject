@extends('layouts.app')

@section('title', 'Event Details')
@section('content')
    <!-- Navigation ( navigation.html ) -->
    <style>
        .btn-container {
          display: flex; 
        }
         
        .btn-container > div {
          width: auto; 
        }
         
        .btn-container .btn, .btn-container .btn-large, .btn-container .btn-flat, .btn-container .btn-large {
          display: block; 
        }

        .addeventatc_icon {
            background: url('/img/calendar.png') !important;
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
                    <div class="row center">
                     @foreach ($videos as $video)

                        <p>{{ $ev->name }}</p>
                        <p>{{ $ev->venue }}</p>
                        <p>Submitted by user: {{ $video->name }}</p>
                       <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->link }}" frameborder="0" allowfullscreen></iframe>
                        
                     @endforeach
                    </div>
                    
                </div>
            </div> 
        </div>
    </div>
@endsection
