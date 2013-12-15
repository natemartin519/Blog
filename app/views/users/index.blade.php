@extends('layouts.admin')

@section('header')
	All Users
@stop


@section('child_content')
	<p>{{ HTML::linkRoute('users.create', 'Add new user', null, array('class' => 'btn btn-primary')) }}</p>

	@if ($users->count())
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>User Name</th>
					<th>Email Address</th>
				</tr>
			</thead>

			<tbody>

				@foreach($users as $user)
				<tr>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ HTML::linkRoute('users.show', 'Show', array($user->id), array('class' => 'btn btn-info')) }}</td>
					<td>{{ HTML::linkRoute('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary')) }}</td>
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