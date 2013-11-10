@extends('layout.master')

@section('content')

<h1>All Comments</h1>

<p>{{ link_to_route('comments.create', 'Add new comment') }}</p>

@if ($comments->count())
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>User ID</th>
				<th>Title</th>
				<th>Body</th>
			</tr>
		</thead>

		<tbody>

			@foreach($comments as $comment)
			<tr>
				<td>{{ $comment->user_id }}</td>
				<td>{{ $comment->header }}</td>
				<td>{{ $comment->body }}</td>
				<td>{{ link_to_route('comments.show', 'Show', array($comment->id), array('class' => 'btn btn-primary')) }}</td>
				<td>{{ link_to_route('comments.edit', 'Edit', array($comment->id), array('class' => 'btn btn-info')) }}</td>
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