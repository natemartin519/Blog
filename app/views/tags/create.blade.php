@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2>Create Tag</h2>
@stop


@section('body')
	{{ Form::open(array('class' => 'form-horizontal', 'route' => 'tags.store')) }}
		
		<div class="form-group">
			{{ Form::label('name', 'Tag Name:', array('class' => 'col-sm-2 control-label')) }}

			<div class="col-sm-8">
				{{ Form::text('name', null, array('placeholder' => 'Tag', 'class' => 'form-control')) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Submit', array('class' => 'btn btn-success'))}}
				{{ HTML::linkRoute('tags.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
			</div>
		</div>
				
	{{ Form::close() }}

@stop