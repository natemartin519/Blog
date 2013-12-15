@extends('layouts.admin')

@section('header')
	Add Comment
@stop


@section('child_content')
	{{ Form::open(array('route' => 'comments.store')) }}
		{{ Form::label('user_id', 'User ID:') }}
		{{ Form::text('user_id', '', array('placeholder' => 'ID')) }}<br>

		{{ Form::label('post_id', 'Post:') }}
		{{ Form::text('post_id', '', array('placeholder' => 'ID')) }}<br>		

		{{ Form::label('body', "Body:") }}
		{{ Form::textarea('body', '', array('placeholder' => 'Enter comment here.')) }}<br>

		{{ Form::submit('Comment', array('class' => 'btn btn-success'))}}
		{{ HTML::linkRoute('comments.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop