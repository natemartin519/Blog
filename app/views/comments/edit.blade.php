@extends('layouts.admin')

@section('title')
	<h2>Edit {{ $comment->user->username }}'s Comment</h2>
@stop


@section('body')
	{{ Form::model($comment, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('comments.update', $comment->id))) }}
		@include('comments.partials.form')
	{{ Form::close() }}

@stop