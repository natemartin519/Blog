@extends('layouts.master')

@section('content')

	<h1>Show Comment</h1>
	<p>{{ link_to_route('comments.index', 'return to all comments') }}</p>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Body</th>
				<th>User ID</th>
				<th>Post ID</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $comment->body }}</td>
				<td>{{ $comment->user_id }}</td>
				<td>{{ $comment->post_id }}</td>
			</tr>
		</tbody>
	</table>

@stop