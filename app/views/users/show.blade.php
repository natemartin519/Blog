@extends('layout.master')

@section('content')

<h1>Show User</h1>

<p>{{ link_to_route('users.index', 'return to all users') }}</p>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>User ID</th>
			<th>Email Address</th>
			<th>Access Level</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->access_level }}</td>
		</tr>
	</tbody>
</table>

@stop