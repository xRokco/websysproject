@extends('layouts.app')


@section('content')
<script>
$(document).ready(function(){
      $('.parallax').parallax();
    });
</script>
<div class="container">
    <br><br>
    <h2 class="header center light-blue-text">Website landing page</h2>
    <br><br>
</div>
<div class="parallax-container">
    <div class="parallax"><img src="img/test.jpg"></div>
</div>
<div class="container">
    <br><br>
    <h2 class="header center light-blue-text">Some more text</h2> 
    <br><br>
</div>
<div class="parallax-container">
    <div class="parallax"><img src="img/test2.jpg"></div>
</div>
@endsection
