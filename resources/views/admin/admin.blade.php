@extends('layouts.app')

@section('title', 'Admin')

@section('content')
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
</style>
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
        	@if ($events)
				@foreach ($events as $event)
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
			            <div class="col s3 btn-container" id="test"> 
			            	<div>
				                <a class="btn red darken-3" href="admin/attendees/{{ $event->id }}">Attendees</a>
				                <a style="margin-top:5px;margin-bottom:5px" class="btn red darken-3" href="admin/edit/{{ $event->id }}">Edit Event</a>
				                <a class="btn red darken-3" href="admin/delete/{{ $event->id }}">Delete Event</a>
				            </div>
			            </div>
			        </div>
			    @endforeach
			@else
			  	<h4 class="center orange-text">You aren't attending any events yet. Checkout our <a href="{{ url('events') }}" >events</a> page.</h4>
			@endif
        	<br>
				<div class="fixed-action-btn" title="Create event" style="bottom: 25px; right: 24px;">
				    <a href="/admin/create" class="btn-floating btn-large red darken-3">
				    	<i class="large material-icons">add</i>
				    </a>
				</div>        
  			</div>


        <div id="inbox" class="col s12">
			<br><br>

			@foreach ($messages as $message)
			    <div class="card grey lighten-5">
			        <div class="col s12">
			            <div class="grey lighten-5">
			                <div class="row valign-wrapper">
			                    <div class="col s2">
			                        <div class=" waves-effect waves-block waves-light">
			                            <i class="activator large material-icons">email</i>
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
			                            <i class="activator large material-icons">email</i>
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

			</div>
		</div>
	</div>
</div>
  

@endsection