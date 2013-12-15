@extends('layouts.master')

@section('content')

	<h1>All Posts</h1>

	@if (Auth::user())
		<p>{{ HTML::linkRoute('posts.create', 'Add new post', null, array('class' => 'btn btn-primary')) }}</p>
	@endif

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

					@if (Auth::user())
						<td>{{ HTML::linkRoute('posts.show', 'Show', array($post->id), array('class' => 'btn btn-info')) }}</td>
						<td>{{ HTML::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary')) }}</td>
						<td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
								{{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
							{{ Form::close() }}
						</td>
					@else
						<td>{{ HTML::linkRoute('posts.show', 'Show', array($post->id), array('class' => 'btn btn-info')) }}</td>	
					@endif	
			
				</tr>
				@endforeach

			</tbody>
		</table>

	@else
		There are no posts
	@endif

@stop