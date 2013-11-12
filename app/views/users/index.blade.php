@extends('layout.master')

@section('content')
<div class="row">
	<div class="span11 offset1">
		<div class="well">
			<legend>Users</legend>

			<p>{{ link_to_route('users.create', 'Add new user') }}</p>

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
		</div>
	</div>
</div>
@stop