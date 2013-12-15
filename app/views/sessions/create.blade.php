@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="well">
				<div class="page-header">
					<h2>Please Login</h2>
				</div>

				{{ Form::open(array('route' => 'sessions.store'))}}
					{{ Form::label('email', 'Email Address:') }}
					{{ Form::text('email', '', array('placeholder' => 'Email')) }} <br>
					
					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password', '', array('placeholder' => 'Password')) }} <br>
					
					{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
					{{ HTML::linkRoute('users.create', 'Register', null, array('class' => 'btn btn-primary')) }}
				{{ Form::close()}}

			</div>
		</div>
	</div>
@stop