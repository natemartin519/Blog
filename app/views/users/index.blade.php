@extends('layouts.admin')

@section('title')
	<h2>User List</h2>
@stop


@section('body')

	@if ($users->count())
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>View</th>
					<th>User Name</th>
					<th>Email Address</th>
					<th>Access Level</th>
					<th>Tools</th>
				</tr>
			</thead>

			<tbody>

				@foreach($users as $user)
				<tr>
					<td>
						<a href="{{ URL::route('users.show', array($user->id)) }}" class="btn btn-success btn-xs">
							<span class="glyphicon glyphicon-eye-open"></span>
						</a>
					</td>

					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>

					{{-- Make a database table to grab values from --}}
					@if ($user->access_level == 0) 
						<td>User</td>
					@else 
						<td>Admin</td>					
					@endif

					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}		
							<a href="{{ URL::route('users.edit', array($user->id)) }}" class="btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						
							<button class="btn btn-danger btn-xs" type="submit">
								<span class="glyphicon glyphicon-trash"></span>
							</button >
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