@extends ('layout.master')

@section('content')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store')) }}
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
		{{ Form::label('confirm', 'Password:') }}
		{{ Form::password('confirm') }}
	</li>	
	<li>
		{{ Form::label('access_level', "Access Level:") }}
		{{ Form::text('access_level') }}
	</li>
	<li>
		{{ Form::submit('Submit', array('class' => 'btn btn-success', 'disabled'))}}
		{{ Form::label('message', 'Not Implemented')}}
	</li>
</ul>
{{ Form::close() }}

@if($errors->any())
<ul>
	{{ inplode('', $errors->all('<li class="error">:message</li>')) }}
</ul>

@endif

@stop