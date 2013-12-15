@extends('layouts.admin')

@section('header')
	Edit {{ $user->username }}
@stop


@section('child_content')
	{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
		{{ Form::label('username', 'User Name:') }}
		{{ Form::text('username') }}<br>

		{{ Form::label('email', 'Email Address:') }}
		{{ Form::text('email') }}<br>

		{{ Form::label('access_level', 'Access Level:') }}

		{{-- Make an database table to grab values from --}}
		{{ Form::select('access_level', array('0' => 'User', '1' => 'Admin'), $user->access_level) }}<br>

		{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('users.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close()}}
@stop

		
