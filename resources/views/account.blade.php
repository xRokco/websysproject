
@extends('layouts.app')

@section('title', 'Update Account')

@section('content') 

<!-- Button for updating user settings -->
<div class="container">
      <br><br>
      <h2 class="header center red-text">Please update your user settings</h2>
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

<!-- Table that displays users information -->
<div class="container">
	<div class="row">
		<div class="col m6 offset-m3 s12">
			{!! Form::model($user, ['method' =>'PATCH', 'action' => ['UserController@updateUser', $user->id]]) !!}
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
					{!! Form::submit('Update', ['class' => 'btn red darken-3']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>	
@endsection

