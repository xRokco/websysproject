@extends('layouts.app')
	@section('title', '404')
    @section('content')

    	<h1 class="center">Error 404: Page Not Found</h1>
    	<h4 class="center">Why not <a href="{{ url('/') }}">return to out homepage?</a></h4>
    @endsection