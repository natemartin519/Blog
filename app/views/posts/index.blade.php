@extends('layouts.master')

@section('header')
    <div class="jumbotron">
      <div class="container">
        <h1>Blog!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

@stop

@section('content')
	
	<div class="row">
		<div class="col-md-9">

			@if ($posts->count())
				@foreach($posts as $post)
			
					<div class="row">
						<div class="panel panel-default">

							<div class="panel-heading">
								<div class="row">
									<div class="col-md-8">
										<h3>
											{{ HTML::linkRoute('posts.show', $post->header, array($post->id)) }}
											<small> by {{ $post->user->username }}</small>
										</h3>
									</div>

									<div class="col-md-4">
										@if (Auth::check())
											{{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
												<div class="btn-toolbar pull-right" role="toolbar">								
	
													@if (Auth::user()->isAdmin())
														
														<div class="btn-group">
															<a href="#" class="btn btn-default btn-xs" disabled="disabled">
																Status:
																{{ $post->status }}	
															</a>
					
															<a href="{{ URL::route('posts.edit', array($post->id)) }}" class="btn btn-danger btn-xs">
																<span class="glyphicon glyphicon-pencil"></span>
															</a>
																	
															<button class="btn btn-danger btn-xs" type="submit">
																<span class="glyphicon glyphicon-trash"></span>
															</button >
														
														</div>

													@endif

													<div class="btn-group">
														<a href="{{ URL::route('posts.show', array($post->id)) }}" class="btn btn-success btn-xs">
															<span class="glyphicon glyphicon-eye-open"></span>
														</a>

														<a href="{{ URL::route('comments.create', array('post'=>$post->id)) }}" class='btn btn-success btn-xs'>
															<span class="glyphicon glyphicon-comment"></span>
														</a>
													</div>

												</div>
											{{ Form::close() }}
										
										@else
											<div class="btn-toolbar pull-right" role="toolbar">	
												<div class="btn-group">
													<a href="{{ URL::route('posts.show', array($post->id)) }}" class="btn btn-success btn-xs">
														<span class="glyphicon glyphicon-eye-open"></span>
													</a>
												</div>	
											</div>									
										
										@endif
									</div>
									
								</div>																
							</div>	

							<div class="panel-body">
								<p>{{ $post->body }}</p>
							</div>

						</div>		
					</div>

				@endforeach
			@else
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">	
								<div class="col-md-8">	
									<h3>There are no posts</h3>
								</div>

								<div class="col-md-4">
									@if (Auth::check() && Auth::user()->isAdmin())
										
										<div class="btn-toolbar pull-right" role="toolbar">
											<div class="btn-group">
												<a href="{{ URL::route('posts.create') }}" class='btn btn-primary btn-xs'>
													<span class="glyphicon glyphicon-plus"></span>
												</a>
											</div>
										</div>

									@endif							
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif

		</div>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<p class="panel-title">
						@if(Auth::check())
							{{ Auth::user()->username }}

							@if(Auth::user()->isAdmin()) 
								(Admin)
							@endif
						
						@else
							Sidebar

						@endif
					</p>
				</div>

				<div class="panel-body">
					<p>Stuff goes here</p>
				</div>
			</div>
		</div>

	</div>

@stop