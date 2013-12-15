@extends('layouts.master')

@section('content')

	<h1>Create Post</h1>
	{{ Form::open(array('route' => 'posts.store')) }}
		<ul>
			<li>
				{{ Form::label('user_id', 'Author:') }}
				{{ Form::text('user_id') }}		
			</li>
			<li>
				{{ Form::label('header', 'Title:') }}
				{{ Form::text('header') }}
			</li>
			<li>
				{{ Form::label('body', "Body:") }}
				{{ Form::textarea('body') }}
			</li>
			<li>
				{{ Form::label('status', "Status:") }}
				{{ Form::text('status') }}
			</li>
			<li>
				{{ Form::submit('Submit', array('class' => 'btn btn-success'))}}
			</li>
		</ul>
	{{ Form::close() }}

@stop