@extends('layouts.app')

@section('content')
<div class="container">
      <br><br>
      <h4 class="header center orange-text">Hi {{ Auth::user()->name }}, you are now logged in.</h4>
      <p class="light center">Please check out the driving directions from {{ Auth::user()->direction }} to the RDS, Dublin below.</p>
</div>


<div class="container">
      <h2 class="header center orange-text"><iframe width="800" height="600" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/directions?origin={{ Auth::user()->direction }}&destination=place_id:ChIJR4pGA8YOZ0gRT_oe5cS4-t0&key=AIzaSyBFaySDzqmlKyFwdG9qGWxGD3rjM1Ub0Bg" allowfullscreen></iframe></h2>
      <br><br>
</div>
@endsection
