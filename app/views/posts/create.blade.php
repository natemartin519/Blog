@extends('layouts.admin')

@section('header')
	<div class="container empty-space"></div>
@stop

@section('title')
	<h2>New Blog Post</h2>
@stop

@section('body')
	{{ Form::open(array('route' => 'posts.store', 'class' => 'form-horizontal')) }}		

 		{{ Form::hidden('user_id', Auth::user()->id) }}
	
		<div class="form-group">
			{{ Form::label('header', 'Title:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">
				{{ Form::text('header', '', array('placeholder' => 'Title', 'class' => 'form-control')) }}
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('tags', 'Tags:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">
				@if (count($tags))				
					{{ Form::select('tags[]', $tags, null, array('multiple', 'size' => '3', 'class' => 'form-control')) }}
				@else
					{{ Form::select('tags[]', array('0' => 'There are no tags'), null, array('multiple', 'disabled', 'size' => '3', 'class' => 'form-control')) }}
				@endif
			</div>
		</div>
		
		<div class="form-group">
			{{ Form::label('status', 'Status:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">
				{{-- Make a database table to grab values from --}}
				{{ Form::select('status', array('0' => 'Draft', '1'=> 'Active', '3' => 'Hidden'), '0', array('class' => 'form-control')) }}
			</div>	
		</div>

		<div class="form-group">
			{{ Form::label('body', 'Body:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">
				{{ Form::textarea('body', '', array('placeholder' => 'Type blog post here.', 'class' => 'form-control', 'rows' => '20')) }}
			</div>
		</div>
	
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Post', array('class' => 'btn btn-success')) }}
				{{ HTML::linkRoute('posts.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}	
			</div>
			
		</div>

	{{ Form::close() }}

@stop