@extends('layouts.app')

    @section('content')
    	<div class="container">
      		<br><br>
      		<h2 class="header center red-text text-lighten-2">Contact us</h2>
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
        		<div class="col s6 offset-s3">
						{!! Form::open(['url' => '/contact']) !!}
						<div class="row">
							{!! Form::label('name', 'Your own name:') !!}
							{!! Form::text('name') !!}
						</div>
						<div class="row">
							{!! Form::label('subject', 'Subject:') !!}
							{!! Form::text('subject') !!}
						</div>
						<div class="row">
							{!! Form::label('email', 'Your email:') !!}
							{!! Form::text('email') !!}
						</div>
						<div class="row">
							{!! Form::label('message', 'Your message:') !!}
							{!! Form::textarea('message') !!}
						</div>
						<div class="row">
							{!! Form::submit('Create', ['class' => 'btn grey waves-effect']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>	

	@stop