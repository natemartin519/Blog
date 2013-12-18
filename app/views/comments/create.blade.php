@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2>Comment</h2>
@stop


@section('body')
	{{ Form::open(array('class' => 'form-horizontal', 'route' => 'comments.store')) }}
		{{ Form::hidden('user_id', Auth::user()->id) }}
		{{ Form::hidden('post_id', $post_id) }}	

		<div class="form-group">
			{{ Form::label('body', "Body:", array('class' => 'col-sm-2 control-label')) }}

			<div class="col-sm-8">
				{{ Form::textarea('body', null, array('placeholder' => 'Enter comment here.', 'class' => 'form-control')) }}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Comment', array('class' => 'btn btn-success'))}}
				{{ HTML::linkRoute('comments.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}				
			</div>
		</div>

	{{ Form::close() }}

@stop