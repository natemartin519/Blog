@extends('layouts.admin')

@section('header')
	User {{ $tag->name }}
@stop


@section('child_content')
	<p>{{ HTML::linkRoute('tags.index', 'Return to all tags', null, array('class' => 'btn btn-primary')) }}</p>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Tag ID</th>
				<th>Tag Name</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
			</tr>
		</tbody>
	</table>

@stop