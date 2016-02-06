@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s6"><a class="red-text" href="#events">Events</a></li>
				<li class="tab col s6"><a class="red-text" href="#inbox">Inbox</a></li>
                <div class="indicator red" style="z-index:1"> </div>
			</ul>
		</div>
		<div id="events" class="col s12">
			<br><br>
			<div class="container">
            	@if ($events)
					@foreach ($events as $event)
						<div class="row grey lighten-5 valign-wrapper" id="event">
				        	<!-- Event Image -->
				            <div class="col center s3">
				                <img class="responsive-img circle" src='img/event_images/{{ $event->image }}' style='height:150px;width:150px;background-size:cover;' />
				            </div>
				                    
				            <!-- Event Description -->
				            <div class="left-align col s5">
				                <h5>{{ $event->name }}</h5>
				                <p class="light">Organiser<p>
				                <p>{{ $event->information }}</p>
				            </div>
				                    
				            <!-- Event Details -->
				            <div class="col s3" id="test"> 
				                <a class="btn red darken-3" href="admin/attendees/{{ $event->id }}">Attendees</a>
				                <a class="btn red darken-3" href="admin/edit/{{ $event->id }}">Edit Event</a>
				                <a class="btn red darken-3" href="admin/delete/{{ $event->id }}">Delete Event</a>
				            </div>
				        </div>
				    @endforeach
				@else
				  	<h4 class="center orange-text">You aren't attending any events yet. Checkout our <a href="{{ url('events') }}" >events</a> page.</h4>
				@endif
            	<br>
       		</div>  
        </div>


        <div id="inbox" class="col s12">
			<div class="section no-pad-bot" id="index-banner">
            	<h1 class="header center teal-text">Inbox</h1>
            	<br>
            	<div class="divider"></div>
			</div>

			@foreach ($messages as $message)
			    <div class="card grey lighten-5">
			        <div class="col s12">
			            <div class="grey lighten-5">
			                <div class="row valign-wrapper">
			                    <div class="col s2">
			                        <div class=" waves-effect waves-block waves-light">
			                            <i class="large material-icons">email</i>
			                        </div>
			                    </div>
			                    <div class="col s9">
			                        <div class="card-content">
			                            <span class="card-title activator grey-text text-darken-4">{{ $message->subject }}<i class="material-icons right">expand_more</i></span>
			                            <a href="/admin/inbox/delete/{{ $message->id }}"><i class="material-icons right">done</i></a>
			                            <p>{{ $message->name }}</p>
			                            <p>{{ $message->email }}</p>
			                            <p>{{ $message->created_at }}</p>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="card-reveal">
			            <span class="card-title grey-text text-darken-4"><i class="material-icons right">expand_less</i></span>
			            <p>{{ $message->message }}</p>
			        </div>
			    </div>
			@endforeach

			@if(! isset($message))
			    <h4 class="center">No unread messages</h4>
			    <div class="divider"></div>
			@endif

			<h4 class="center">Read Messages:</h4>
			<div class="divider"></div>

			@foreach ($readMessages as $readMessage)
			    <div class="card grey lighten-5">
			        <div class="col s12">
			            <div class="grey lighten-5">
			                <div class="row valign-wrapper">
			                    <div class="col s2">
			                        <div class=" waves-effect waves-block waves-light">
			                            <i class="large material-icons">email</i>
			                        </div>
			                    </div>
			                    <div class="col s9">
			                        <div class="card-content">
			                            <span class="card-title activator grey-text text-darken-4">{{ $readMessage->subject }}<i class="material-icons right">expand_more</i></span>
			                            <p>{{ $readMessage->name }}</p>
			                            <p>{{ $readMessage->email }}</p>
			                            <p>{{ $readMessage->created_at }}</p>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="card-reveal">
			            <span class="card-title grey-text text-darken-4"><i class="material-icons right">expand_less</i></span>
			            <p>{{ $readMessage->message }}</p>
			        </div>
			    </div>
			@endforeach
			
			@if(! isset($readMessage))
			    <h4 class="center">No read messages</h4>
			@endif

			<!--  Scripts-->
		    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		    <script src="js/materialize.js"></script>
		    <script src="js/init.js"></script>
			</div>
		</div>
	</div>
</div>
  

@endsection