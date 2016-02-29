@extends('layouts.app')

@section('title', 'Add Video')

<!-- Add video option -->
@section('content')
	<div class="container">
		<br><br>
		<h2 class="header center red-text text-lighten-2">Add an Event video</h2>
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
	
<!-- Where video is submitted -->
	<div class="container">
		<div class="row">
			<div class="col m6 offset-m3 s12">
				{!! Form::open(['method' => 'POST', 'action' => ['UserController@storeVideo', $ev], 'files'=>true]) !!}
					<div class="row">
						{!! Form::label('title', 'Title:') !!}
						{!! Form::text('title') !!}
					</div>
					<div class="row">
						{!! Form::label('link', 'Link:') !!}
						{!! Form::text('link') !!}
					</div>
					
					<div class="row">
						{!! Form::submit('Create', ['class' => 'btn red darken-3']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>	

@stop