@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2 >Comment <small>{{ $comment->post->header }}</small></h2>
@stop


@section('body')
	{{ Form::open(array('method' => 'DELETE', 'route' => array('comments.destroy', $comment->id))) }}	

		<div class="btn-toolbar pull-right" role="toolbar">
			<div class="btn-group">
				<a href="{{ URL::route('comments.index') }}" class="btn btn-success btn-xs">
					<span class="glyphicon glyphicon-backward"></span>
				</a>			
			</div>

			<div class="btn-group">

				@if (Auth::user()->isAdmin())
					<a href="{{ URL::route('comments.edit', array($comment->id)) }}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>

					<button class="btn btn-danger btn-xs" type="submit">
						<span class="glyphicon glyphicon-trash"></span>
					</button >
				@endif

			</div>
		</div>

	{{ Form::close() }}

	<form action="" class="form-horizontal">

		<div class="form-group">
			{{ Form::label('username', 'Username:', array('class' => 'col-sm-2 control-label')) }}	
			
			<div class="col-sm-8">
				{{ Form::label('username', $comment->user->username, array('class' => 'control-label')) }}	
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('title', 'Post Title:', array('class' => 'col-sm-2 control-label')) }}	
			
			<div class="col-sm-8">
				{{ Form::label('title', $comment->post->header, array('class' => 'control-label')) }}	
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('comment', 'Comment:', array('class' => 'col-sm-2 control-label')) }}	
			
			<div class="col-sm-8">
				{{ Form::label('comment', $comment->body, array('class' => 'control-label')) }}	
			</div>
		</div>

	</form>

@stop