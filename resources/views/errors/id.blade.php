@extends('layouts.app')
	@section('title', 'ID error')
    @section('content')
    	<div class="container">
    		<div class="col s12">
		    	<h3 class="center">There's an error in the ID provided in the URL</h3>
		    	<h4 class="center">Either you can't access that ID, or it doesn't exist</a></h4>
		    	<img style="margin-left:auto;margin-right:auto;display:block" src="{{ url('/img/trump-bodyguards.jpg') }}"/>
		    </div>
    	</div>
    @endsection