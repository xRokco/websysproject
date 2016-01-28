@extends('layouts.app')

@section('content')
<div class="container">
      <h4 class="header center orange-text">Hi {{ Auth::user()->name }}, you are now logged in.</h4>
      <p class="light center">Your selected address is shown below, visit out <a href="{{ url('/events') }}">events</a> page for more specific driving instructions.</p>
</div>
<div class="container">
    <h2 class="header center orange-text"><iframe width="700" height="525" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q={{ Auth::user()->direction }}&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg" allowfullscreen></iframe></h2>
    <br><br>
</div>
@endsection
