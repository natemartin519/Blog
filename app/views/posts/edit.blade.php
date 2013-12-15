@extends('layouts.admin')

@section('header')
	Edit {{ $post->title }}
@stop


@section('child_content')
	{{ Form::model($post, array('method' => 'PATCH', 'route' => array('posts.update', $post->id))) }}
		{{ Form::label('user_id', 'User ID:') }}
		{{ Form::text('user_id') }}<br>

		{{ Form::label('header', 'Title:') }}
		{{ Form::text('header') }}<br>

		{{ Form::label('body', "Body:") }}
		{{ Form::textarea('body') }}<br>

		{{ Form::label('status', "Status:") }}
		{{-- Make a database table to grab values from --}}
		{{ Form::select('status', array('0' => 'Draft', '1'=> 'Active', '3' => 'Hidden'), $post->status) }}<br>

		{{ Form::submit('Update', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('posts.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop