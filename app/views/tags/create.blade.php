@extends('layouts.admin')

@section('title')
	<h2>Create Tag</h2>
@stop


@section('body')
	{{ Form::open(array('class' => 'form-horizontal', 'route' => 'tags.store')) }}
		@include('tags.partials.form')
	{{ Form::close() }}

@stop