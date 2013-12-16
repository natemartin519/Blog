<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to my blog!</title>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootswatch/3.0.2/cyborg/bootstrap.min.css">
	{{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.0.2/spacelab/bootstrap.min.css">--}}
	{{--<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">--}}
	{{ HTML::style ('scripts/default.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<header class="navbar navbar-default navbar-fixed-top"  role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<strong>{{ HTML::link('/', '{ Blog }', array('class' => 'navbar-brand')) }}</strong>
			</div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					@if(Auth::check())
						@if(Auth::user()->isAdmin())						
							<li>{{ HTML::link('posts', 'Posts') }}</li>
							<li>{{ HTML::link('comments', 'Comments') }}</li>
							<li>{{ HTML::link('users', 'Users') }}</li>
							<li>{{ HTML::link('tags', 'Tags') }}</li>																		
							<li>{{ HTML::link('logout', 'Logout') }}</li>
						@else
							<li>{{ HTML::link('comments', 'Your Comments') }}</li>
							<li>{{ HTML::link('users', 'Your Profile') }}</li>
							<li>{{ HTML::link('logout', 'Logout') }}</li>		
						@endif		

					@else
						<li>{{ HTML::link('login', 'Login') }}</li>
					@endif				
				</ul>
			</div>

		</div>
	</header>

	<div class="container">
		<div class="body">

			@if($errors->any())
				<div class="row">		
					<div class="alert alert-danger alert-dismissable">
						<a href="#" class='close' data-dismiss='alert' aria-hidden="true">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
						<ul>{{ implode('', $errors->all('<li class="danger">:message</li>')) }}</ul>
					</div>
				</div>	
			@endif

			{{-- Don't know if this is still needed --}}
			@if (Session::has('message'))
				<div class="row">
					<div class="alert alert-info alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-hidden="true">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
						<p>{{ Session::get('message') }}</p>
					</div>
				</div>
			@endif

			@yield('content')

		</div>
	</div>

	<footer role="footer"></footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>	
</body>
</html>