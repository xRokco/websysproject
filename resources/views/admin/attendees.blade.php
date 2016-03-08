@extends('layouts.app')

@section('title', 'All Attendees')

	@section('content')
		<div class="container">
			@if($atns->count()>0)
				@if($ev->deleted_at==NULL)
					<h4 class="center"><a href="{{ url('/admin/attendees/print') }}/{{ $id }}" target="_blank">Print all {{ $count }} attendees </a></h4>
				@endif
				<table class="responsive-table highlight">
					<thead>
						<th data-field="id">User ID</th>
			            <th data-field="name">Full Name</th>
			            <th data-field="email">E-mail</th>
			            <th data-field="code">Code</th>
					</thead>
					<tbody>
					@foreach($atns as $atn)
						<tr>
							<td>{{ $atn->id }}</td>
							<td>{{ $atn->name }} {{ $atn->surname }}</td>
							<td>{{ $atn->email }}</td>
							<td>{{ $atn->code }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@else
				<h4 class="center red-text light">No attendees yet</h4>
			@endif
		</div>
	@stop