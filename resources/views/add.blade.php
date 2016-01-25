@extends('layouts.app')

    @section('content')
    	<div class="container">
      		<br><br>
      		<h2 class="header center red-text text-lighten-2">Create event</h2>
      		<br><br>
		</div>

		<div class="container">
   			<div class="row">
        		<div class="col s6 offset-s3">
					{!! Form::open(['url' => 'events']) !!}
						<div class="row">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name') !!}
						</div>
						<div class="row">
							{!! Form::label('venue', 'Venue:') !!}
							{!! Form::text('venue') !!}
						</div>
						<div class="row">
							{!! Form::label('city', 'City:') !!}
							{!! Form::text('city') !!}
						</div>
						<div class="row">
							{!! Form::label('capacity', 'Capacity:') !!}
							{!! Form::text('capacity') !!}
						</div>
						<div class="row">
							{!! Form::label('date', 'Date:') !!}
							{!! Form::text('date', null, ['placeholder' => '2016-01-01']) !!}
						</div>
						<div class="row">
							{!! Form::submit('Create', ['class' => 'btn grey waves-effect']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>	
	@stop