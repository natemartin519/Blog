@extends('layouts.admin')

@section('header')
	<div class="container empty-space"></div>
@stop

@section('title')
	<h2>Edit {{ $post->header }}</h2>
@stop

@section('body')
	{{ Form::model($post, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('posts.update', $post->id))) }}		
		
		{{ Form::hidden('user_id', Auth::user()->id) }}

		<div class="form-group">
			{{ Form::label('header', 'Title:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">
				{{ Form::text('header', $post->header, array('class' => 'form-control')) }}			
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('status', "Status:", array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{-- Make a database table to grab values from --}}
				{{ Form::select(
					'status', 
					array('0' => 'Draft', '1'=> 'Active', '3' => 'Hidden'), 
					$post->status, 
					array('class' => 'form-control')) 
				}}		
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('body', "Body:", array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">
				{{ Form::textarea('body', $post->body, array('class' => 'form-control', 'rows' => '20')) }}				
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Update', array('class' => 'btn btn-success')) }}
				{{ HTML::linkRoute('posts.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}			
			</div>
		</div>

	{{ Form::close() }}

@stop