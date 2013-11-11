@extends('layout.master')

@section('content')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}

<ul>
	<li>
		{{ Form::label('email', 'Email Address:') }}
		{{ Form::text('email') }}
	</li>
	<li>
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password') }}
	</li>
	<li>
		{{ Form::label('password_confirmation', 'Password:') }}
		{{ Form::password('password_confirmation') }}
	</li>	
	<li>
		{{ Form::label('access_level', "Access Level:") }}
		{{ Form::text('access_level') }}
	</li>
	<li>
		{{ Form::submit('Update', array('class' => 'btn btn-success', 'disabled')) }}
		{{ Form::label('message', 'Not Implemented') }}
		{{ link_to_route('users.index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
	</li>
</ul>
{{ Form::close() }}

@if($errors->any())
<ul>
	{{ inplode('', $errors->all('<li class="error">:message</li>')) }}
</ul>

@endif


@stop