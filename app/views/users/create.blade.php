@extends('layouts.admin')

@section('title')
	<h2>Register User</h2>
@stop


@section('body')
	{{ Form::open(array('class' => 'form-horizontal', 'route' => 'users.store')) }}
		
		<div class="form-group">
			{{ Form::label('username', 'User Name:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">	
				{{ Form::text('username', null, array('placeholder' => 'Username', 'class' => 'form-control')) }}				
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email Address:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">	
				{{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}				
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">	
				{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}				
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('confromation', 'Confirm:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">	
				{{ Form::password('password_confirmation', array('placeholder' => 'Password', 'class' => 'form-control')) }}				
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Register', array('class' => 'btn btn-success')) }}
				{{ HTML::linkRoute('users.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}				
			</div>
		</div>

	{{ Form::close() }}

@stop