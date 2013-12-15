@extends('layouts.admin')

@section('header')
	User {{ $user->username }}
@stop


@section('child_content')
	<p>{{ HTML::linkRoute('users.index', 'Return to all users', null, array('class' => 'btn btn-primary')) }}</p>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>User ID</th>
				<th>User Name</th>
				<th>Email Address</th>
				<th>Access Level</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->access_level }}</td>
			</tr>
		</tbody>
	</table>
@stop