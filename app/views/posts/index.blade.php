@extends('layout.master')

@section('content')

<h1>All Posts</h1>

<p>{{ link_to_route('posts.create', 'Add new post') }}</p>

@if ($posts->count())
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Title</th>
				<th>Body</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>

			@foreach($posts as $post)
			<tr>
				<td>{{ $post->user_id }}</td>
				<td>{{ $post->header }}</td>
				<td>{{ $post->body }}</td>
				<td>{{ $post->status }}</td>
				<td>{{ link_to_route('posts.show', 'Show', array($post->id), array('class' => 'btn btn-primary')) }}</td>
				<td>{{ link_to_route('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }}</td>
				<td>
					{{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
						{{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>				
			</tr>
			@endforeach

		</tbody>
	</table>

@else
	There are no posts
@endif

@stop