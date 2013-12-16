@extends('layouts.admin')

@section('header')
	Add Comment
@stop


@section('child_content')
	{{ Form::open(array('route' => 'comments.store')) }}
		{{ Form::hidden('user_id', Auth::user()->id) }}
		{{ Form::hidden('post_id', $post_id) }}	

		{{ Form::label('body', "Body:") }}
		{{ Form::textarea('body', '', array('placeholder' => 'Enter comment here.')) }}<br>

		{{ Form::submit('Comment', array('class' => 'btn btn-success'))}}
		{{ HTML::linkRoute('comments.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop