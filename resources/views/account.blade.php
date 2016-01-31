
@extends('layouts.app')

@section('content') 


<div class="container">
      <br><br>
      <h2 class="header center orange-text">Please update your user settings</h2>
      <br><br>
</div>

<div class="container">
   			<div class="row">
        		<div class="col s6 offset-s3">
					{!! Form::model($user, ['method' =>'PATCH', 'action' => 'HomeController@update']) !!}
						<div class="row">
							{!! Form::label('name', 'Name:') !!}
							{!! Form::text('name') !!}
						</div>
						<div class="row">
							{!! Form::label('surname', 'Surname:') !!}
							{!! Form::text('surname') !!}
						</div>
						<div class="row">
							{!! Form::label('email', 'Email:') !!}
							{!! Form::text('email') !!}
						</div>
						<div class="row">
							{!! Form::label('direction', 'Direction:') !!}
							{!! Form::text('direction') !!}
						</div>
						<div class="row">
							{!! Form::submit('Update', ['class' => 'btn grey waves-effect']) !!}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>	
@endsection

