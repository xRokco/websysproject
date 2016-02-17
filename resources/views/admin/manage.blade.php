@extends('layouts.app')

@section('title', 'All Users')

	@section('content')
		<div class="container">
			<h5 class="center">Users</h5>
			<table class="responsive-table highlight">
				<thead>
					<th data-field="id">User ID</th>
		            <th data-field="name">Full Name</th>
		            <th data-field="email">E-mail</th>
		            <th data-field="admin">Admin</th>
		            <th data-field="role">Change role</th>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }} {{ $user->surname }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->admin }}</td>
							@if($user->admin == 0)
								<td><a href="/admin/promote/{{ $user->id }}">Make admin</a></td>
							@else
								<td><a href="/admin/demote/{{ $user->id }}">Demote</a></td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@stop