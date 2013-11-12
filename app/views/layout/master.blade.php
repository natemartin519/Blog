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
		<div class="span16 well">
			<h1>My Blog</h1>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span2">
			<ul class="nav nav-list well">
				@if(Auth::check())
					<li class="nav-header">
						{{ Auth::user()->username }}

						@if(Auth::user()->admin()) 
							(Admin)
						@endif
					</li>
					
					@if(Auth::user()->admin())						
						<li>{{ HTML::link('posts', 'Edit Posts') }}</li>
						<li>{{ HTML::link('comments', 'Edit Comments') }}</li>
						<li>{{ HTML::link('tags', 'Edit Tags') }}</li>
						<li>{{ HTML::link('users', 'Edit Users') }}</li>											
						<li>{{ HTML::link('logout', 'Logout') }}</li>
					@else
						<li>{{ HTML::link('comments', 'Edit Your Comments') }}</li>
						<li>{{ HTML::link('users', 'Edit Your Profile') }}</li>
						<li>{{ HTML::link('logout', 'Logout') }}</li>		
					@endif		

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