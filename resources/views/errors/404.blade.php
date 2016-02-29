@extends('layouts.app')
	@section('title', '404')
    @section('content')
    	<div class="container">
    		<div class="col s12">
	    		<h3 class="center">Error 404: Page Not Found</h3>
	    		<h4 class="center">Why not <a href="{{ url('/') }}">return to out homepage?</a></h4>
		    	<img style="margin-left:auto;margin-right:auto;display:block;max-width:500px" src="{{ url('/img/trump-bald.jpg') }}"/>
	    	</div>
	    </div>
    @endsection