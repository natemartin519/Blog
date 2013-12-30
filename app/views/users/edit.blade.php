@extends('layouts.admin')

@section('title')
	<h2>Edit {{ $user->username }}</h2>
@stop


@section('body')
	{{ Form::model($user, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
		
		<div class="form-group">
			{{ Form::label('username', 'User Name:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{ Form::text('username', $user->username, array('class' => 'form-control')) }}					
			</div>
		</div>
	
		<div class="form-group">
			{{ Form::label('email', 'Email Address:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{ Form::text('email', $user->email, array('class' => 'form-control')) }}				
			</div>
		</div>

		@if (Auth::User()->isAdmin())

			<div class="form-group">
				{{ Form::label('access_level', 'Access Level:', array('class' => 'col-sm-2 control-label')) }}
				
				<div class="col-sm-8">
					{{-- Make a database table to grab values from --}}
					{{ Form::select(
						'access_level', 
						array('0' => 'User', '1' => 'Admin'), 
						$user->access_level, 
						array('class' => 'form-control')) 
					}}
				</div>
			</div>

		@endif	
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-8">
				{{ Form::submit('Save', array('class' => 'btn btn-success')) }}

				@if (Auth::user()->isAdmin())
					{{ HTML::linkRoute('users.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
				@else
					{{ HTML::linkRoute('users.show', 'Cancel', array(Auth::user()->id), array('class' => 'btn btn-danger')) }}
				@endif
			</div>
		</div>

	{{ Form::close()}}
	
@stop

		
