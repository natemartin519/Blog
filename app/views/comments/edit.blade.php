@extends('layouts.admin')

@section('header')
	Edit Comment
@stop


@section('child_content')
	{{ Form::model($comment, array('method' => 'PATCH', 'route' => array('comments.update', $comment->id))) }}
		{{ Form::label('user_id', 'Author:') }}
		{{ Form::text('user_id') }}<br>	

		{{ Form::label('post_id', 'Post:') }}
		{{ Form::text('post_id') }}<br>

		{{ Form::label('body', "Body:") }}
		{{ Form::textarea('body') }}<br>

		{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('comments.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop