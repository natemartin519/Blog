<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">	
</head>
<body>
	<header class="container">
		<h1>My Blog</h1>
		<div class="navbar navbar-default">
			<ul>
				@if(Auth::check())
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

					<li>
						{{ Auth::user()->username }}

						@if(Auth::user()->admin()) 
							(Admin)
						@endif
					</li>

				@else
					<li>{{ HTML::link('login', 'Login') }}</li>
				@endif				
			</ul>
		</div>
	</header>

	<div role="body" class="container">
		@if (Session::has('message'))
			<div class="row flash alert"> <!-- bootstrap update -->
				<p>{{ Session::get('message') }}</p>
			</div>
		@endif

		@yield('content')		
	</div>

	<footer class="content"></footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>	
</body>
</html>