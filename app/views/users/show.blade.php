@extends('layouts.admin')

@section('header')
     <div class="container empty-space"></div>
@stop

@section('title')
	<h2 >User {{ $user->username }}</h2>
@stop


@section('body')

	{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}	

		<div class="btn-toolbar pull-right" role="toolbar">
			<div class="btn-group">
				
				@if (Auth::user()->isAdmin())
					<a href="{{ URL::route('users.index') }}" class="btn btn-success btn-xs">
						<span class="glyphicon glyphicon-backward"></span>
					</a>			
				@else
					<a href="{{ URL::route('posts.index') }}" class="btn btn-success btn-xs">
						<span class="glyphicon glyphicon-backward"></span>
					</a>
				@endif

			</div>

			<div class="btn-group">

				@if (Auth::user()->id == $user->id || Auth::user()->isAdmin())
					<a href="{{ URL::route('users.edit', array($user->id)) }}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
				@endif

				@if (Auth::user()->isAdmin())
					<button class="btn btn-danger btn-xs" type="submit">
						<span class="glyphicon glyphicon-trash"></span>
					</button >
				@endif

			</div>
		</div>

	{{ Form::close() }}
	
	<form action="" class="form-horizontal">
		<div class="form-group">
			{{ Form::label('id', 'User ID:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{ Form::label('id', $user->id, array('class' => 'control-label')) }}					
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('username', 'User Name:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{ Form::label('username', $user->username, array('class' => 'control-label')) }}					
			</div>
		</div>
	
		<div class="form-group">
			{{ Form::label('email', 'Email Address:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">				
				{{ Form::label('email', $user->email, array('class' => 'control-label')) }}				
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('access_level', 'Access Level:', array('class' => 'col-sm-2 control-label')) }}
			
			<div class="col-sm-8">
				
				{{-- Make a database table to grab values from --}}
				@if ($user->access_level == 0) 
					{{ Form::label('access_level', 'User', array('class' => 'control-label')) }}
				
				@else 
					{{ Form::label('access_level', 'Admin', array('class' => 'control-label')) }}
				
				@endif

			</div>
		</div>

	</form>	

@stop