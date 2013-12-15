@extends('layouts.admin')

@section('header')
	Comment
@stop


@section('child_content')
	<p>{{ HTML::linkRoute('comments.index', 'return to all comments', null, array('class' => 'btn btn-primary')) }}</p>

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