@extends('layouts.app')
@section('content')
<div class="container">
      <h4 class="header center orange-text">Please pick an event</h4>
</div>

<div class="container">
    <div class="section">
    <br><br><br><br>
      <!--   Icon Section   -->
      <div class="row">
        <a name="learn"></a>
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons"><?php $events = App\events::find(1);
		echo $events->name.' event'; ?></i></h2>
            <h5 class="center"><?php echo 'This event is held in the '.$events->venue.' in '.$events->city; ?></h5>

            <p class="light"><?php echo 'The '.$events->venue.' is located in the heart of '.$events->city.' and has a capacity of '.$events->capacity; ?> </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons"><?php $events = App\events::find(4);
		echo $events->name.' event'; ?></i></h2>
            <h5 class="center"><?php echo 'This event is held in the '.$events->venue.' in '.$events->city; ?></h5>

            <p class="light"><?php echo 'The '.$events->venue.' is located in the heart of '.$events->city.' and has a capacity of '.$events->capacity; ?> </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center teal-text"><i class="material-icons"><?php $events = App\events::find(3);
		echo $events->name.' event'; ?></i></h2>
            <h5 class="center"><?php echo 'This event is held in the '.$events->venue.' in '.$events->city; ?></h5>

            <p class="light"><?php echo 'The '.$events->venue.' is located in the heart of '.$events->city.' and has a capacity of '.$events->capacity; ?> </p>
          </div>
        </div>
      </div>


@endsection