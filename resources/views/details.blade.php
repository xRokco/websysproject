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
                    <p class="condensed light left-align valign-wrapper"><i class="material-icons">payment</i>&euro;{{ $ev->price }}</p>
            <!-- Check if clicked attend already -->
            @if($rsvp)
                <!-- Add to Calendar API -->
                <div class="btn-container">
                    <div>
                        <div title="Add to Calendar" class="btn red darken-3 addeventatc" style="padding-top:11px;">
                            <span class="white-text" style="font-weight:normal" >Add to Calendar</span>
                            <span class="start">{{ $ev->date }} {{ $ev->start_time }}</span>
                            <span class="end">{{ $ev->date }} {{ $ev->end_time }}</span>
                            <span class="title">{{ $ev->name }}</span>
                            <span class="description">{{ $ev->information }}</span>
                            <span class="location">{{ $ev->venue}}, {{ $ev->city }}</span>
                            <span class="date_format">MM/DD/YYYY</span>
                        </div>
                        <a class="btn red darken-3" style="margin-top:5px;margin-bottom:5px" target="_blank" href="print/{{ $ev->id }}">Print Ticket</a>
                        <button class="btn red darken-3" id="unattend">Unattend Event</button>
                    </div>
                </div>
            @else
                @if($full == TRUE)
                    <a id="attend" class="btn red darken-3 disabled" title="Tickets Sold Out">Attend Event</a>
                @else
                <a id="customButton" class="btn red darken-3" href="attend/{{ $ev->id }}">Attend Event</a>

                    <script src="https://checkout.stripe.com/checkout.js"></script>
                        <script>
                          var handler = StripeCheckout.configure({
                            key: "<?php echo $stripe['publishable']; ?>",
                            image: '/img/event_images/{{ $ev->image }}',
                            locale: 'auto',
                            token: function(token) {
                                // Use the token to create the charge with a server-side script.
                                // You can access the token ID with `token.id`
                                <?php
                                    $count = \DB::table('rsvp')->where('eventid', $ev->id)->count();
                                    $ev = \DB::table('events')->where('id', $ev->id)->first();

                                    if($count < $ev->capacity)
                                    {
                                        do {
                                            $code = str_random(10);
                                        } while (\DB::table('rsvp')->where("code", $code)->where('eventid', $ev->id)->first() instanceof Rsvp);
                                        
                                        \DB::table('rsvp')->insert(['userid' => Auth::user()->id, 'eventid' => $ev->id, 'code' => $code]);
                                        echo "window.location.href = \"/dash\";";

                                    } else {
                                        echo "Event full";
                                    }    
                                ?>
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
            <script>
                $(document).ready(function(){
                    $("#locationbutton").click(function(){
                        $("#hotels").load('/hotels.php', {'venue':'{{ $ev->venue }}', 'city':'{{ $ev->city }}'});                    
                        $( document ).ajaxComplete(function() {
                            $(".progress").hide();
                        });
                    });
                });
            </script>
            <script type="text/javascript">
                $('button#unattend').on('click', function(){
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
                        setTimeout(function(){ window.location.href = "/events/details/unattend/{{$ev->id}}" }, 1000);
                    });
                })
            </script>
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s6"><a class="red-text" href="#description">Description</a></li>
                    <li class="tab col s6"><a id="locationbutton" class="red-text" href="#location">Directions</a></li>
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
                    <h5 class="center">Here's a few of hotels within a couple of kilometers of the venue</h5>
                    <table class="highlight">
                        <thead>
                            <th data-field="id">Hotel</th>
                            <th data-field="address">Address</th>
                            <th data-field="phone">Phone Number</th>
                            <th data-field="rating">Rating</th>
                        </thead>
                        <tbody id="hotels">
                            <div class="progress red">
                              <div class="indeterminate red darken-3"></div>
                            </div>
                        </tbody>
                    </table>
                    <button>test</button>
                </div>
            </div> 
        </div>
    </div>
@endsection
