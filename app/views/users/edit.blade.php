@extends('layout.master')

@section('content')
<div class="row">
	<div class="span4 offset1">
		<div class="well">
			<legend>Edit User</legend>
			{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
				@if($errors->any())
					<div class="alert alert-error">
						<a href="#" class='close' data-dismiss='alert'>&times;</a>
						{{ implode('', $errors->all('<li class="error">:message</li>')) }}
					</div>
				@endif
				{{ Form::label('username', 'User Name:') }}
				{{ Form::text('username') }} 

				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email') }}

				{{ Form::label('access_level', 'Access Level:') }}
				{{ Form::text('access_level') }} 

				<br>

				{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
				{{ HTML::linkRoute('users.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
			{{ Form::close()}}
		</div>
	</div>
</div>

@stop

		
