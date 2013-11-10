@extends('layout.master')

@section('content')

<h1>All Users</h1>

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

@if ($users->count())
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Email Address</th>
				<th>Access Level</th>
			</tr>
		</thead>

		<tbody>

			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->access_level }}</td>
				<td>{{ link_to_route('users.show', 'Show', array($user->id), array('class' => 'btn btn-primary')) }}</td>
				<td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
						{{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>				
			</tr>
			@endforeach

		</tbody>
	</table>

@else
	There are no users
@endif

@stop