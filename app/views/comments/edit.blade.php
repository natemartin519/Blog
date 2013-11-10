@extends('layout.master')

@section('content')

<h1>Edit Comment</h1>
{{ Form::model($comment, array('method' => 'PATCH', 'route' => array('comments.update', $comment->id))) }}

<ul>
	<li>
		{{ Form::label('user_id', 'Author:') }}
		{{ Form::text('user_id') }}		
	</li>
	<li>
		{{ Form::label('post_id', 'Post:') }}
		{{ Form::text('post_id') }}		
	</li>	
	<li>
		{{ Form::label('body', "Body:") }}
		{{ Form::textarea('body') }}
	</li>
	<li>
		{{ Form::submit('Update', array('class' => 'btn btn-success')) }}
		{{ link_to_route('comments.index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
	</li>
</ul>
{{ Form::close() }}

@if($errors->any())
<ul>
	{{ inplode('', $errors->all('<li class="error">:message</li>')) }}
</ul>

@endif


@stop