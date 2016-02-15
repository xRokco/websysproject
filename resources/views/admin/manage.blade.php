@extends('layouts.app')

@section('title', 'All Users')

	@section('content')
		<div class="container">
			@if($users)
				<h5 class="center">Non-admins</h5>
				<table class="responsive-table highlight">
					<thead>
						<th data-field="id">User ID</th>
			            <th data-field="name">Full Name</th>
			            <th data-field="email">E-mail</th>
			            <th data-field="admin">Promote</th>
					</thead>
					<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }} {{ $user->surname }}</td>
							<td>{{ $user->email }}</td>
							<td><a href="/admin/promote/{{ $user->id }}">Make admin</a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@else
				<h4 class="center">No non-admin users</h4>
			@endif
		</div>

		<div class="container">
			@if($adminUsers)
				<br />
				<div class="divider"></div>
				<br />
				<h5 class="center">Admins</h5>
				<table class="responsive-table highlight">
					<thead>
						<th data-field="id">User ID</th>
			            <th data-field="name">Full Name</th>
			            <th data-field="email">E-mail</th>
			            <th data-field="admin">Demote</th>
					</thead>
					<tbody>
					@foreach($adminUsers as $adminUser)
						<tr>
							<td>{{ $adminUser->id }}</td>
							<td>{{ $adminUser->name }} {{ $adminUser->surname }}</td>
							<td>{{ $adminUser->email }}</td>
							<td><a href="/admin/demote/{{ $adminUser->id }}">Demote admin</a></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@else
				<h4 class="center">No admins users</h4>
			@endif
		</div>
	@stop