@extends('layouts.master')

@section('content')

	<h1>Show Post</h1>
	<p>{{ HTML::linkRoute('posts.index', 'Back', null, array('class' => 'btn btn-primary')) }}</p>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Author</th>
				<th>Title</th>
				<th>Body</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $post->user_id }}</td>
				<td>{{ $post->header }}</td>
				<td>{{ $post->body }}</td>
				<td>{{ $post->status }}</td>
			</tr>
		</tbody>
	</table>

@stop