@extends('layouts.app')

    @section('content')
    	<div class="container">
      		<br><br>
      		<h2 class="header center red-text text-lighten-2">Create event</h2>
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
					{!! Form::open(['url' => '/events', 'files'=>true]) !!}
						<div class="row">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name') !!}
						</div>
						<div class="row">
							{!! Form::label('venue', 'Venue:') !!}
							{!! Form::text('venue') !!}
						</div>
						<div class="row">
							{!! Form::label('city', 'City and country:') !!}
							{!! Form::text('city') !!}
						</div>
						<div class="row">
							{!! Form::label('price', 'Price:') !!}
							{!! Form::text('price') !!}
						</div>
						<div class="row">
							{!! Form::label('capacity', 'Capacity:') !!}
							{!! Form::text('capacity') !!}
						</div>
						<div class="row">
							{!! Form::label('date', 'Date:') !!}
							{!! Form::date('date', null, ['class' => 'datepicker']) !!}
						</div>
						<div class="input-field row">
							{!! Form::label('information', 'Information:') !!}
							{!! Form::textarea('information', NULL, ['class' => 'materialize-textarea']) !!}
						</div>
						<div class="input-field row">
							{!! Form::label('description', 'Description:') !!}
							{!! Form::textarea('description', NULL, ['class' => 'materialize-textarea']) !!}
						</div>
						<div class="row file-field input-field">
							<div class="btn red darken-3">
								<span>File</span>
								{!! Form::file('image') !!}
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>
						<div class="row">
							{!! Form::submit('Create', ['class' => 'btn red darken-3 waves-effect']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>	

		<script>
			$('.datepicker').pickadate({
    			selectMonths: true, // Creates a dropdown to control month
    			selectYears: 15, // Creates a dropdown of 15 years to control year
    			format: 'yyyy-mm-dd'   
  			});
		</script>
	@stop