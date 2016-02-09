@extends('layouts.app')
<?php
	$atns = DB::table('rsvp')
			->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('*')
            ->where('rsvp.eventid', '=', $atnd)
            ->get();
?>

@section('title', 'All Attendees')

	@section('content')
		<div class="container">
			@if($atns)
				<table class="highlight">
					<thead>
						<th data-field="id">User ID</th>
			            <th data-field="name">Full Name</th>
			            <th data-field="email">E-mail</th>
			            <th data-field="admin">Admin</th>
			            <th data-field="code">Code</th>
					</thead>
					<tbody>
					@foreach($atns as $atn)
						<tr>
							<td>{{ $atn->id }}</td>
							<td>{{ $atn->name }} {{ $atn->surname }}</td>
							<td>{{ $atn->email }}</td>
							<td>{{ $atn->admin }}</td>
							<td>{{ $atn->code }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<h4 class="center"><a href="print/{{ $atnd }} ">Print all</a></h4>
			@else
				<h4 class="center">No attendees yet</h4>
			@endif
		</div>
	@stop