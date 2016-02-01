@extends('layouts.app')

@section('content')
<div class="container">
      <h4 class="header center orange-text">Hi {{ Auth::user()->name }}, you are now logged in.</h4>
      <p class="light center">Your account details are shown below</p>
</div>

<div class="container light">
	<p>Name - {{ Auth::user()->name }}</p>
	<p>Surname - {{ Auth::user()->surname }}</p>
	<p>E-mail Address - {{ Auth::user()->email }}</p>
	<p>Travelling Address - {{ Auth::user()->direction }}</p>
	<p>Edit your user details <a href="{{ url('/account') }}" >here</a></p>
</div>
<div class="center">
    <iframe width="700" height="525" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q={{ Auth::user()->direction }}&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg" allowfullscreen></iframe>
    <br><br>
</div>
@endsection
