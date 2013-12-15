@extends('layouts.admin')

@section('header')
	All Tags
@stop


@section('child_content')
	<p>{{ HTML::linkRoute('tags.create', 'Add new tag', null, array('class' => 'btn btn-primary')) }}</p>

	@if ($tags->count())
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Tag Name</th>
				</tr>
			</thead>

			<tbody>

				@foreach($tags as $tag)
				<tr>
					<td>{{ $tag->name }}</td>
					<td>{{ HTML::linkRoute('tags.show', 'Show', array($tag->id), array('class' => 'btn btn-info')) }}</td>
					<td>{{ HTML::linkRoute('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-primary')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}
							{{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
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