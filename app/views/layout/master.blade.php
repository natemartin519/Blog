<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">	
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<!-- Bootstrap 3
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet"-->
	<style>
		table form { margin-bottom: 0;}
		form ul { margin-left: 0; list-style: none; }
		.error { color: red; font-style: italic;}
	</style>
	
</head>
<body>
	<div class="row-fluid">
		<div class="span12 well">
			<h1>My Blog</h1>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span2">
			<ul class="nav nav-list well">
				@if(Auth::user())
				<li class="nav-header">
					{{ Auth::user()->email }}

					@if(Auth::user()->admin_access) 
						(Admin)
					@endif
				</li>

				<li>{{ HTML::link('posts', 'View Post') }}</li>
				<li>{{ HTML::link('users', 'View Users') }}</li>
				<li>{{ HTML::link('comments', 'View Comments') }}</li>
				<li>{{ HTML::link('tags', 'View Tags') }}</li>
				<li>{{ HTML::link('logout', 'Logout') }}</li>
				
				@else
				<li>{{ HTML::link('login', 'Login') }}</li>

				@endif
			</ul>
		</div>

		<div class="span9">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('content')		
		</div>
	</div>
</body>
</html>