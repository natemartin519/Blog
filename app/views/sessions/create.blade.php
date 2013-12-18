@extends('layouts.master')

@section('header')
	<div class="container empty-space"></div>
@stop

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="well">
				<div class="page-header">
					<h2>Please Login</h2>
				</div>

				{{ Form::open(array('route' => 'sessions.store', 'class' => 'form-horizontal'))}}

					<div class="form-group">
						{{ Form::label('email', 'Email Address:', array('class' => 'col-sm-4 control-label')) }}
						
						<div class="col-sm-7">			
							{{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}		
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('password', 'Password:', array('class' => 'col-sm-4 control-label')) }}
						
						<div class="col-sm-7">						
							{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-7">
							{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
							{{ HTML::linkRoute('users.create', 'Register', null, array('class' => 'btn btn-primary')) }}
						</div>
					</div>

				{{ Form::close()}}

			</div>
		</div>
	</div>

@stop