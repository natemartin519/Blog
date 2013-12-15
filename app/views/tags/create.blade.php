@extends('layouts.admin')

@section('header')
	Create Tag
@stop


@section('child_content')
	{{ Form::open(array('route' => 'tags.store')) }}
		{{ Form::label('name', 'Tag:') }}
		{{ Form::text('name', '', array('placeholder' => 'Tag')) }}<br>	
		
		{{ Form::submit('Submit', array('class' => 'btn btn-success'))}}
		{{ HTML::linkRoute('tags.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop