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
<script src="{{ url('/sweetalert/dist/sweetalert.min.js') }}"></script> 
<link rel="stylesheet" type="text/css" href="{{ url('/sweetalert/dist/sweetalert.css') }}">
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
			<!--Checks that there are any events at all-->
        	@if ($events)
        		<!--Outputs html for each event returned-->
				@foreach ($events as $event)
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
			            <div class="col m3 s5 offset-s1 btn-container" id="test"> 
			            	<div>
				                <a class="btn red darken-3" href="{{ url('admin/attendees') }}/{{ $event->id }}">Attendees</a>
				                <a style="margin-top:5px;margin-bottom:5px" class="btn red darken-3" href="{{ url('admin/edit') }}/{{ $event->id }}">Edit Event</a>
				                <button class="btn red darken-3" id="delete" eventid="{{ $event->id }}">Delete Event</button>
				            </div>
			            </div>
			        </div>
			    @endforeach
			<!--If there are no events, output this message-->
			@else
			  	<h4 class="center orange-text">There aren't any events. <a href="{{ url('/admin/create') }}" >Create one </a>.</h4>
			@endif
        	<br>
				<div class="fixed-action-btn" style="bottom: 25px; right: 24px;">
					<a href="{{ url('/admin/create') }}" title="Create event" class="btn-floating btn-large red darken-3">
				    	<i class="large material-icons">add</i>
				    </a>
				    <ul>
				    	<li><a href="{{ url('/admin/manage') }}" title="Manage users" class="btn-floating blue"><i class="material-icons">perm_identity</i></a></li>
					</ul>
				</div>      
  			</div>


        <div id="inbox" class="col s12">
			<br><br>
			<div>
				@if ($messages)
					@foreach ($messages as $message)
					    <div class="card grey lighten-5">
					        <div class="col s12">
					            <div class="grey lighten-5">
					                <div class="row valign-wrapper">
					                    <div class="col m2 offset-m1 s4">
					                        <div class=" waves-effect waves-block waves-light">
					                            <i class="activator medium material-icons">email</i>
					                        </div>
					                    </div>
					                    <div class="col m9 s4 offset-s4">
					                        <div class="card-content">
					                            <span class="card-title activator grey-text text-darken-4">{{ $message->subject }}<i class="material-icons right">expand_more</i></span>
					                            <a href="{{ url('/admin/inbox/delete') }}/{{ $message->id }}"><i class="material-icons right">done</i></a>
					                          
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
				@endif
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
				                    <div class="col m2 offset-m1 s4">
				                        <div class=" waves-effect waves-block waves-light">
				                            <i class="activator medium material-icons">email</i>
				                        </div>
				                    </div>
				                    <div class="col m9 s4 offset-s4">
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
			<script type="text/javascript">
				$('button#delete').on('click', function(){
					var id = $(this).attr('eventid');
					swal({   
						title: "Are you sure?",   
						text: "This will delete the event and remove all attendees. This cannot be undone. Type \"delete\" below to confirm you want to do this:",   
						type: "input",   
						showCancelButton: true,   
						closeOnConfirm: false,   
						animation: "slide-from-top",   
						inputPlaceholder: "Write \"delete\""
					}, 
					function(inputValue){   
						if (inputValue === false) return false;      
						if (inputValue != "delete") {     
							swal.showInputError("You need to write \"delete\"!");     
							return false   
						}     
						swal("Event deleted", "");
						setTimeout(function(){ window.location.href = "{{ url('/admin/delete/') }}/" + id; }, 1000);
					});
				})
			</script>
		</div>
	</div>
</div>
@endsection