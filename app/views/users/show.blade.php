@extends('layouts.admin')

@section('header')
	User {{ $user->username }}
@stop


@section('child_content')

	@if (Auth::user()->id == $user->id)
		<p>{{ HTML::linkRoute('users.edit', 'Edit', array(Auth::user()->id), array('class' => 'btn btn-primary')) }}</p>
		
	@elseif (Auth::user()->isAdmin())
		<p>{{ HTML::linkRoute('users.edit', 'Return', null, array('class' => 'btn btn-primary')) }}</p>
	
	@else
		<p>{{ HTML::linkRoute('posts.index', 'Return', null, array('class' => 'btn btn-primary')) }}</p>

	@endif

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