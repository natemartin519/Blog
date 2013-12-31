@extends('layouts.admin')

@section('title')
	<h2>Comment</h2>
@stop


@section('body')
	{{ Form::open(array('class' => 'form-horizontal', 'route' => 'comments.store')) }}
		@include('comments.partials.form')
	{{ Form::close() }}

@stop