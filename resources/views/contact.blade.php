@extends('layouts.app')

@section('title', 'Contact Us')

    @section('content')
    	<div class="container">
      		<br><br>
      		<h2 class="header center red-text">Contact us</h2>
      		<p class="center">If you find a bug or have a suggestion, message us here to let us know.</p>
      		<br><br>
		</div>

		@if (count($errors) > 0)
    		<div class="alert alert-danger center red-text">
        		<ul>
            		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li>
            		@endforeach
        		</ul>
    		</div>
		@endif

		<div class="container">
   			<div class="row">
        		<div class="col m6 offset-m3 s12">
						{!! Form::open(['url' => '/contact']) !!}
						
						<div class="row">
							{!! Form::label('subject', 'Subject:') !!}
							{!! Form::text('subject') !!}
						</div>
						
						<div class="input-field row">
							{!! Form::label('message', 'Your message:') !!}
							{!! Form::textarea('message', NULL, ['class' => 'materialize-textarea']) !!}
						</div>
						<div class="row">
							{!! Form::submit('Send', ['class' => 'btn red darken-3']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>	

	@stop