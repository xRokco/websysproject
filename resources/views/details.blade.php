@extends('layouts.app')

@section('title', 'Event Details')
@section('content')
    <!-- Navigation ( navigation.html ) -->
	
	<!-- Styling for responsivness -->
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
            background: url('{{ url('/img/calendar.png') }}') !important;
        }

        /**
         * CSS3 balancing hover effect
         * Read the tutorial here: http://webbb.be/blog/little-css3-3d-hover-effects/
         */
        .block .normal {
            cursor: pointer;
            position:relative;
            z-index:2;
        }
        .block .hover {
            margin-top:-36px; display: block; text-decoration: none;
            position: relative; z-index:1;
            transition: all 250ms ease;
        }
        .block:hover .hover {
            margin-top: 0; 
            transform-origin: top;
            /*
            animation-name: balance;
            animation-duration: 1.5s;
            animation-timing-function: ease-in-out;
            animation-delay: 110ms;
            animation-iteration-count: 1;
            animation-direction: alternate;
            */
            animation: balance 1.5s ease-in-out 110ms 1 alternate;
        }

        @keyframes balance { 
            0% { margin-top: 0; } 
            15% { margin-top: 0; transform: rotateX(-50deg); }  
            30% { margin-top: 0; transform: rotateX(50deg); } 
            45% { margin-top: 0; transform: rotateX(-30deg); } 
            60% { margin-top: 0; transform: rotateX(30deg); } 
            75% { margin-top: 0; transform: rotateX(-30deg); } 
            100% { margin-top: 0; transform: rotateX(0deg);} 
        }

        .breadcrumb::before{
            margin-top:-5px !important;
        }
    </style>
    <script src="{{ url('/sweetalert/dist/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/sweetalert/dist/sweetalert.css') }}">
	
	<!-- Event details -->
    <div class="container">
        <div class="section no-pad-bot" id="no-padding-top">
            <div class="row" style="margin-top: 1em; margin-bottom: 0">
                <div class="col m6 s12">
                    <h4 class="light red-text" style="line-height:50%;">{{ $ev->name }}</h4>
                </div>
                <div class="col m6 s11 offset-s1 right-align" style="padding-top: 1em">
                    <a href="{{ url('/events') }}" class="light red-text breadcrumb">Events</a>
                    <a href="#" class="red-text text-darken-1 breadcrumb">{{ $ev->name }}</a>
                </div>
            </div>
            <div class="divider"></div>

            <div class="row" id="event">
                <!-- Event Image -->
                <div class="col center m4 s12" style="margin-bottom:5px; margin-top: 1em; margin-left: 1em;">
                    <img class="responsive-img circle" src="{{ url('/img/event_images') }}/{{ $ev->image }}" />
                </div>
                
                <!-- Event Description -->
                <div class="left-align col m4 s6">
                    <h5 class="light red-text text-darken-3" style="padding-top: 1em; padding-left: 1em">Event Details</h5>
                    <p class="flow-text" style="padding-left: 1em">{{ $ev->information }}</p>
                </div>

                <!-- Event Details -->
                <div class="col m3 right s6" style="padding-top: 2em">
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">today</i>{{ $ev->date->toFormattedDateString() }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">query_builder</i>{{ $ev->date->toTimeString() }} to {{ $ev->end_time->toTimeString() }}</p>                    
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">location_on</i>{{ $ev->venue}}, {{ $ev->city }}</p>
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $ev->price }}</p>
                    <!-- Check if clicked attend already -->
                    @if($rsvp)
                        <!-- Add to Calendar API -->
                        <div class="btn-container">
                            <div>
                                <div title="Add to Calendar" class="btn red darken-3 addeventatc" style="padding-top:11px;">
                                    <span class="white-text" style="font-weight:normal" >Add to Calendar</span>
                                    <span class="start">{{ $ev->date }}</span>
                                    <span class="end">{{ $ev->end_time }}</span>
                                    <span class="title">{{ $ev->name }}</span>
                                    <span class="description">{{ $ev->information }}</span>
                                    <span class="location">{{ $ev->venue}}, {{ $ev->city }}</span>
                                    <span class="date_format">MM/DD/YYYY</span>
                                </div>
                                <a class="btn red darken-3" style="margin-top:5px;margin-bottom:5px" target="_blank" href="{{ url('/events/details/print') }}/{{ $ev->id }}">Print Ticket</a>
                                <a class="btn red darken-3" id="unattend">Unattend</a>
                            </div>
                        </div>
						<!-- The attending button -->
                    @else
                        @if($full == TRUE)
                            <div class="block btn-container">
                                <div>
                                    <div class="normal">
                                        <span id="attend" class="btn red darken-3 disabled" title="Tickets Sold Out">Attend</span>
                                    </div>
                                    <span class="btn red darken-3 hover">Sold Out!</span>
                                </div>
                            </div>
                        @else
                        <a id="customButton" class="btn red darken-3" href="#">Attend</a>
                            <script src="https://checkout.stripe.com/checkout.js"></script>
                            <script>
                                var handler = StripeCheckout.configure({
                                    key: "<?php echo $stripe['publishable']; ?>",
                                    image: '{{ url('/img/event_images/') }}/{{ $ev->image }}',
                                    locale: 'auto',
                                    token: function(token) {
                                        // Use the token to create the charge with a server-side script.
                                        // You can access the token ID with `token.id`
                                        $.post('{{ url('/events/details/attend') }}', {
                                            _token: $('meta[name=csrf-token]').attr('content'),
                                            evid: {{ $ev->id }},
                                            stripeToken: token.id
                                        })
                                        setTimeout( function(){
                                            window.location.href = "{{ url('/dash') }}";
                                        }, 500);
                                    }
                                });

                                $('#customButton').on('click', function(e) {
                                    // Open Checkout with further options
                                    handler.open({
                                        name: '{{ $ev->name }}',
                                        description: 'Non-refundable',
                                        currency: "eur",
                                        amount: '{{ $ev->price }}00',
                                        email: '{{ Auth::user()->email }}'
                                    });
                                    e.preventDefault();
                                });

                                // Close Checkout on page navigation
                                $(window).on('popstate', function() {
                                    handler.close();
                                });
                            </script> 
                        @endif
                    @endif 
                    </div>
                    </div>
                </div>
                <div class="row">
                <script>
                    $(document).ready(function(){
                            $("#hotels").load('{{ url('hotels.php') }}', {'venue':'{{ $ev->venue }}', 'city':'{{ $ev->city }}', 'api':'{{ env('MAPS_API')}}'});                    
                            $( document ).ajaxComplete(function() {
                                $(".progress").hide();
                            });
                    });
                </script>
                <script type="text/javascript">
                    $('#unattend').on('click', function(){
                        var id = $(this).attr('eventid');
                        swal({   
                            title: "Are you sure?",   
                            text: "This will unattend you from this event. A refund on any ticket paid for will not be given. This cannot be undone without repurchasing a ticket. Type \"{{Auth::user()->name}}\" below to confirm you want to do this:",   
                            type: "input",   
                            showCancelButton: true,   
                            closeOnConfirm: false,   
                            animation: "slide-from-top",   
                            inputPlaceholder: "Write \"{{Auth::user()->name}}\""
                        }, 
                        function(inputValue){   
                            if (inputValue === false) return false;      
                            if (inputValue != "{{Auth::user()->name}}") {     
                                swal.showInputError("You need to write \"{{Auth::user()->name}}\"!");     
                                return false   
                            }     
                            swal("Unattended", "");
                            setTimeout(function(){ window.location.href = "{{ url('/events/details/unattend') }}/{{$ev->id}}" }, 1000);
                        });
                    })
                </script>
				<!-- Tab stuff -->
                <div class="row">
                    <div class="col s12">
                      <ul class="tabs">
                        <li class="tab col s4"><a class="red-text" href="#description">Description</a></li>
                        <li class="tab col s4"><a id="locationbutton" class="red-text" href="#location">Directions</a></li>
                        <li class="tab col s4"><a class="red-text" href="#comments">Comments</a></li>
                        <div class="indicator red" style="z-index:1"> </div>
                      </ul>
                    </div>
					<!-- Description of the event -->
                    <div id="description" class="col s12">
                        <br>
                        <p id="">
                            {{ $ev->description }}
                        </p>
                    </div>
					<!-- The location details on how to get to the event -->
                    <div id="location" class="col s12">
                        <div class="row center">
                        <div class="col m8 s12">
                        <br><br>
                            <iframe width="700" style="max-width:90%" height="525" frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed/v1/directions?origin={{ Auth::user()->direction }}&destination={{ $ev->venue }}, {{ $ev->city }}&key={{ env('MAPS_API') }}" allowfullscreen></iframe>
                        </div>
                        <div class="col m4 s12" style="padding-top: 3em">
                            <h5 class="light red-text">Your Location:</h5>
                            <h6>{{ Auth::user()->direction }}</h6>
                            <h5 class="light red-text" style="padding-top: 1em">Event Location:</h5>
                            <h6>{{ $ev->venue}}, {{ $ev->city }}</h6>
                        </div>
                        </div>
                        <div class="divider"></div>
                        <h4 class="red-text light" style="padding-top: 1em">Hotels</h4>
                        <h5 class="light" style="padding-bottom: 1em">Here's a few of hotels within a couple of kilometers of the venue</h5>
                        <table class="highlight">
                            <thead class="red darken-2">
                                <th data-field="id" class="white-text">Hotel</th>
                                <th data-field="address" class="white-text">Address</th>
                                <th data-field="phone" class="white-text">Phone Number</th>
                                <th data-field="rating" class="white-text">Rating</th>
                            </thead>
                            <tbody id="hotels">
                                <div class="progress red">
                                  <div class="indeterminate red darken-3"></div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                    <div id="comments" class="col s12">
                        
                        <br/>
                        <!-- Ajax Setup to bottom of HTML file, because jQuery wasn't loaded yet
                        remove the 'url' option, because you have already the 'action' variant -->
                        {!! Form::open(array('method'=>'POST', 'id'=>'myform', 'action' => 'UserController@storeComment')) !!}
                        <div class="row grey lighten-4" style="margin-bottom: 0.5em; padding-top: 1em">
                            <div class="input-field col s12">
                                {!! Form::label('comment',' ') !!}
                                {{ Form::hidden('ev', $ev->id) }}
                                {!! Form::textarea('comment',null,['placeholder'=>'Add a comment...','class' => 'form-control showbutton','rows'=>'1']) !!}
                            </div>

                            {!! Form::submit('Comment',['class'=>'btn red darken-3 right', 'style'=>'margin-bottom: 1em']) !!}
                        
                        </div>
                        {!! Form::close() !!}
                            @foreach ($comments as $comment)
                            <div class="row grey lighten-4" style="margin-bottom: 0.5em;">
                                <div class="input-field col s3" style="border-right: 5px solid white; margin-top: 0">
                                    <h5 class="light red-text text-darken-3">{{ $comment->name }}</h5>
                                    <ul>
                                    <li>Posted on {{ $comment->created_at->toFormattedDateString() }}</li>
                                    <li>at {{ $comment->created_at->toTimeString() }}</li>
                                    <li> <a class="btn red darken-3" style="margin-top:5px;margin-bottom:5px"  href="{{ url('/events/delete/') }}/{{ $comment->id }}">Delete Comment</a></li>
                                    </ul>
                                </div>
                                <div class="input-field col s9">
                                    <p class="valign-wrapper">{{ $comment->comment }}</p>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
