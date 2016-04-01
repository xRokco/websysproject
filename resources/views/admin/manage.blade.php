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
							<?php
								$admin = DB::table('admins')
						        ->join('users', 'users.id', '=', 'admins.userid')
						        ->select('admins.*')
						        ->where('userid', '=', $user->id)
						        ->get();
							?>
							@if($admin)
							<td>Yes</td>
							<td><a href="{{ url('/admin/demote') }}/{{ $user->id }}">Demote</a></td>
							@else
							<td>No</td>
							<td><a href="{{ url('/admin/promote') }}/{{ $user->id }}">Make admin</a></td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="center"> 
				@include('layouts.pagination', ['paginator' => $users])
			</div>
		</div>
	@stop