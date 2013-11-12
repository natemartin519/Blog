@extends('layout.master')

@section('content')
<div class="row">
	<div class="span11 offset1">
		<div class="well">
			<legend>User</legend>

			<p>{{ link_to_route('users.index', 'return to all users') }}</p>

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
		</div>
	</div>
</div>
@stop