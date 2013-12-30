@extends('layouts.admin')

@section('title')
	<h2>Edit {{ $comment->user->username }}'s Comment</h2>
@stop


@section('body')
	{{ Form::model($comment, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('comments.update', $comment->id))) }}
		{{ Form::hidden('user_id', $comment->user_id) }}
		{{ Form::hidden('post_id', $comment->post_id) }}

		<div class="form-group">
			{{ Form::label('body', "Body:", array('class' => 'col-sm-2 control-label')) }}

			<div class="col-sm-8">
				{{ Form::textarea('body', $comment->body, array('class' => 'form-control')) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
				{{ HTML::linkRoute('comments.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
			</div>
		</div>
	
	{{ Form::close() }}

@stop