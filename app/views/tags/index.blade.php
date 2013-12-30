@extends('layouts.admin')

@if ($tags->count())
	@section('title')
		<h2>All Tags</h2>
	@stop

	@section('body')
		
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Tag Name</th>
					<th>Tools</th>
				</tr>
			</thead>

			<tbody>

				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->name }}</td>

						<td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}		
								<a href="{{ URL::route('tags.edit', array($tag->id)) }}" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
							
								<button class="btn btn-danger btn-xs" type="submit">
									<span class="glyphicon glyphicon-trash"></span>
								</button >
							{{ Form::close() }}
						</td>	

					</tr>
				@endforeach

			</tbody>
		</table>
	@stop

@else
	@section('title')
		<h2>No Tags Found!</h2>
	@stop	 	
@endif


