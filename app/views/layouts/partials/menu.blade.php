<header class="navbar navbar-default navbar-fixed-top navbar-inverse"  role="navigation">

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
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <span class="caret"></span></a>
							
							<ul class="dropdown-menu">
								<li>{{ HTML::link('posts', 'View Posts') }}</li>
								<li>{{ HTML::linkRoute('posts.create', 'New Post') }}</li>
							</ul>								
						</li>					
						
						<li>{{ HTML::link('comments', 'Comments') }}</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <span class="caret"></span></a>	

							<ul class="dropdown-menu">
								<li>{{ HTML::link('users', 'View Users') }}</li>
								<li>{{ HTML::linkRoute('users.create', 'New User') }}</li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Tools <span class="caret"></span></a>

							<ul class="dropdown-menu">
								<li>{{ HTML::link('tags', 'Manage Tags') }}</li>
								<li>{{ HTML::linkRoute('tags.create', 'New Tag') }}</li>							
							</ul>								
						</li>
																								
						<li>{{ HTML::link('logout', 'Logout') }}</li>
					@else
						<li>{{ HTML::link('comments', 'Your Comments') }}</li>
						<li>{{ HTML::linkRoute('users.show', 'Your Profile', array(Auth::user()->id)) }}</li>
						<li>{{ HTML::link('logout', 'Logout') }}</li>		
					@endif		

				@else
					<li>{{ HTML::link('login', 'Login') }}</li>
				@endif				
			</ul>
		</div>

	</div>
</header>