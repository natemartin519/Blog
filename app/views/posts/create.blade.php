@extends('layouts.admin')

@section('header')
	Create Post
@stop


@section('child_content')
	{{ Form::open(array('route' => 'posts.store')) }}
		{{ Form::label('user_id', 'User ID:') }}
		{{ Form::text('user_id', '', array('placeholder' => 'ID')) }}<br>	

		{{ Form::label('header', 'Title:') }}
		{{ Form::text('header', '', array('placeholder' => 'Title')) }}<br>

		{{ Form::label('body', "Body:") }}
		{{ Form::textarea('body', '', array('placeholder' => 'Type blog post here.')) }}<br>

		{{ Form::label('status', "Status:") }}
		{{-- Make a database table to grab values from --}}
		{{ Form::select('status', array('0' => 'Draft', '1'=> 'Active', '3' => 'Hidden'), '0') }}<br>

		{{ Form::submit('Post', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('posts.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop