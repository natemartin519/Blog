@extends('layouts.master')

@section('content')

	<h1>Show Tag</h1>
	<p>{{ link_to_route('tags.index', 'return to all tags') }}</p>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Tag Name</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $tag->name }}</td>
			</tr>
		</tbody>
	</table>

@stop