<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to my blog!</title>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootswatch/3.0.2/spacelab/bootstrap.min.css">
	{{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.0.2/yeti/bootstrap.min.css">--}}
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
	@include ('layouts.partials.menu')
	@yield('header')

	<div class="container">
		<div class="body">
			@include ('layouts.partials.message')
			@yield('content')
		</div>
	</div>

	<footer role="footer"></footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>	
</body>
</html>