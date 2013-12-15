@extends('layouts.admin')

@section('header')
	All Comments
@stop


@section('child_content')
	<p>{{ HTML::linkRoute('comments.create', 'Add new comment', null, array('class' => 'btn btn-primary')) }}</p>

	@if ($comments->count())
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Body</th>
					<th>User ID</th>
					<th>Post ID</th>
				</tr>
			</thead>

			<tbody>

				@foreach($comments as $comment)
				<tr>
					<td>{{ $comment->body }}</td>
					<td>{{ $comment->user_id }}</td>
					<td>{{ $comment->post_id }}</td>
					<td>{{ HTML::linkRoute('comments.show', 'Show', array($comment->id), array('class' => 'btn btn-info')) }}</td>
					<td>{{ HTML::linkRoute('comments.edit', 'Edit', array($comment->id), array('class' => 'btn btn-primary')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('comments.destroy', $comment->id))) }}
							{{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>				
				</tr>
				@endforeach

			</tbody>
		</table>

	@else
		There are no comments
	@endif

@stop