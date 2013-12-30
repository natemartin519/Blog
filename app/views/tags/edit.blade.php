@extends('layouts.admin')

@section('title')
	<h2>Edit {{ $tag->name }}</h2>
@stop


@section('body')
	{{ Form::model($tag, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('tags.update', $tag->id))) }}
		@include('tags.partials.form')
	{{ Form::close() }}

@stop