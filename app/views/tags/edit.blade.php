@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2>Edit {{ $tag->name }}</h2>
@stop


@section('body')
	{{ Form::model($tag, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('tags.update', $tag->id))) }}
		
		<div class="form-group">
			{{ Form::label('name', 'Tag Name:', array('class' => 'col-sm-2 control-label')) }}

			<div class="col-sm-8">
				{{ Form::text('name', $tag->name, array('class' => 'form-control')) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
				{{ HTML::linkRoute('tags.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
			</div>
		</div>
		
	{{ Form::close() }}

@stop