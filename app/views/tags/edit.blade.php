@extends('layouts.admin')

@section('header')
	Edit {{ $tag->name }}
@stop


@section('child_content')
	{{ Form::model($tag, array('method' => 'PATCH', 'route' => array('tags.update', $tag->id))) }}
		{{ Form::label('name', 'Tag:') }}
		{{ Form::text('name') }}<br>

		{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('tags.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop