@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2>Tag {{ $tag->name }}</h2>
@stop


@section('body')
	{{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}	

		<div class="btn-toolbar pull-right" role="toolbar">
			
			<div class="btn-group">
				<a href="{{ URL::route('tags.index') }}" class="btn btn-success btn-xs">
					<span class="glyphicon glyphicon-backward"></span>
				</a>			
			</div>

			<div class="btn-group">
				<a href="{{ URL::route('tags.edit', array($tag->id)) }}" class="btn btn-danger btn-xs">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>

				<button class="btn btn-danger btn-xs" type="submit">
					<span class="glyphicon glyphicon-trash"></span>
				</button >
			</div>

		</div>

	{{ Form::close() }}

	<form action="" class="form-horizontal">
		
		<div class="form-group">
			{{ Form::label('id', 'Tag ID:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{ Form::label('id', $tag->id, array('class' => 'control-label')) }}					
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('name', 'Tag Name:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{ Form::label('name', $tag->name, array('class' => 'control-label')) }}					
			</div>
		</div>

	</form>	

@stop