@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Blog!</h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">

			@if ($posts->count())
				@foreach($posts as $post)
			
					<div class="row">
						<div class="panel panel-default">

							<div class="panel-heading">
								<div class="row">
									<div class="col-md-8">
										<h3>
											{{ HTML::linkRoute('posts.show', $post->header, array($post->id)) }}
											<small> by {{ $post->user_id }}</small>
										</h3>
									</div>

									<div class="col-md-4">
										@if (Auth::check() && Auth::user()->isAdmin())
											
											{{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}							
												
												<div class="btn-toolbar pull-right" role="toolbar">								
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

														<a href="{{ URL::route('posts.create') }}" class='btn btn-success btn-xs'>
															<span class="glyphicon glyphicon-plus"></span>
														</a>
													</div>
												</div>

											{{ Form::close() }}

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

		<div class="col-md-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3>Sidebar</h3>
				</div>

				<div class="panel-body">
					<p>Stuff goes here</p>
				</div>
			</div>
		</div>

	</div>

@stop