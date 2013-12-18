@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2>Tag List</h2>
@stop


@section('body')
	@if ($tags->count())
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>View</th>
					<th>Tag Name</th>
					<th>Tools</th>
				</tr>
			</thead>

			<tbody>

				@foreach($tags as $tag)
				<tr>
					<td>
						<a href="{{ URL::route('tags.show', array($tag->id)) }}" class="btn btn-success btn-xs">
							<span class="glyphicon glyphicon-eye-open"></span>
						</a>
					</td>

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

	@else
		There are no tags
	@endif


@stop