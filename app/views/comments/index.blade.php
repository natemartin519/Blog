@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2>All Comments</h2>
@stop


@section('body')

	@if ($comments->count())
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>View</th>
					<th>Blog Title</th>
					
					@if (Auth::user()->isAdmin())
						<th>User</th>
					@endif

					<th>Comment</th>

					@if (Auth::user()->isAdmin())
						<th>Tools</th>
					@endif
				</tr>
			</thead>

			<tbody>

				@foreach($comments as $comment)
					<tr>					
						<td>
							<a href="{{ URL::route('comments.show', array($comment->id)) }}" class="btn btn-success btn-xs">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						</td>

						<td>{{ $comment->post->header }}</td>

						@if (Auth::user()->isAdmin())
							<td>{{ $comment->user->username }}</td>
						@endif							

						<td>{{ $comment->body }}</td>

						@if (Auth::user()->isAdmin())
							<td>
								{{ Form::open(array('method' => 'DELETE', 'route' => array('comments.destroy', $comment->id))) }}		
									<a href="{{ URL::route('comments.edit', array($comment->id)) }}" class="btn btn-danger btn-xs">
										<span class="glyphicon glyphicon-pencil"></span>
									</a>
								
									<button class="btn btn-danger btn-xs" type="submit">
										<span class="glyphicon glyphicon-trash"></span>
									</button >
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