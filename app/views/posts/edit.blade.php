@extends('layout.master')

@section('content')

<h1>Edit Post</h1>
{{ Form::model($post, array('method' => 'PATCH', 'route' => array('posts.update', $post->id))) }}

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
		{{ Form::submit('Update', array('class' => 'btn btn-success')) }}
		{{ link_to_route('posts.index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
	</li>
</ul>
{{ Form::close() }}

@if($errors->any())
<ul>
	{{ inplode('', $errors->all('<li class="error">:message</li>')) }}
</ul>

@endif


@stop