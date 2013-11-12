@extends('layout.master')

@section('content')
<div class="row">
	<div class="span4 offset1">
		<div class="well">
			<legend>Register</legend>
			{{ Form::open(array('route' => 'users.store')) }}
				@if($errors->any())
					<div class="alert alert-error">
						<a href="#" class='close' data-dismiss='alert'>&times;</a>
						{{ implode('', $errors->all('<li class="error">:message</li>')) }}
					</div>
				@endif
				{{ Form::text('username', '', array('placeholder' => 'Username')) }} <br>
				{{ Form::text('email', '', array('placeholder' => 'Email')) }} <br>
				{{ Form::password('password', '', array('placeholder' => 'Password')) }} <br>
				{{ Form::password('password_confirmation', '', array('placeholder' => 'Password')) }} <br>
				{{ Form::submit('Register', array('class' => 'btn btn-success')) }}
				{{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger')) }}
			{{ Form::close()}}
		</div>
	</div>
</div>

@stop