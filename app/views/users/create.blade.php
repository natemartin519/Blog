@extends('layouts.admin')

@section('header')
	Create User
@stop


@section('child_content')
	{{ Form::open(array('route' => 'users.store')) }}
		{{ Form::label('username', 'User Name:') }}
		{{ Form::text('username', '', array('placeholder' => 'Username')) }} <br>
		
		{{ Form::label('email', 'Email Address:') }}
		{{ Form::text('email', '', array('placeholder' => 'Email')) }} <br>

		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password', '', array('placeholder' => 'Password')) }} <br>

		{{ Form::label('confromation', 'Confirm:') }}
		{{ Form::password('password_confirmation', '', array('placeholder' => 'Password')) }} <br>

		{{ Form::submit('Register', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('users.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	{{ Form::close() }}

@stop