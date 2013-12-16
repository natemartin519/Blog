@extends('layouts.admin')

@section('header')
	All Comments
@stop


@section('child_content')

	@if ($comments->count())
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Post ID</th>
					<th>Body</th>

					@if (Auth::user()->isAdmin())
						<th>User ID</th>
					@endif
					
				</tr>
			</thead>

			<tbody>

				@foreach($comments as $comment)
					<tr>					
						<td>{{ $comment->post_id }}</td>
						<td>{{ $comment->body }}</td>
						
						@if (Auth::user()->isAdmin())
							<td>{{ $comment->user_id }}</td>
							
							<td>{{ HTML::linkRoute('comments.show', 'Show', array($comment->id), array('class' => 'btn btn-info')) }}</td>
							<td>{{ HTML::linkRoute('comments.edit', 'Edit', array($comment->id), array('class' => 'btn btn-primary')) }}</td>
							<td>
								{{ Form::open(array('method' => 'DELETE', 'route' => array('comments.destroy', $comment->id))) }}
									{{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
								{{ Form::close() }}
							</td>	
						@endif

					</tr>
				@endforeach

			</tbody>
		</table>

	@else
		There are no comments
	@endif

@stop