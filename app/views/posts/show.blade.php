@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-9">			
			<div class="row">
				<div class="panel panel-default">

					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-8">
								<h3>
									{{ $post->header }}
									<small> by {{ $post->user->username }}</small>
								</h3>
							</div>

							<div class="col-sm-4">
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
											@else

											@endif

											<div class="btn-group">
												<a href="{{ URL::route('posts.index') }}" class="btn btn-success btn-xs">
													<span class="glyphicon glyphicon-backward"></span>
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
											<a href="{{ URL::route('posts.index') }}" class="btn btn-success btn-xs">
												<span class="glyphicon glyphicon-backward"></span>
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

					<div class="panel-footer">
						<div class="page-header">
							<h3>User Comments</h3>
						</div>
						
						@foreach ($post->comments as $comment)

							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="col-sm-offset-1">							
										<h5>
											Comment by {{ $comment->user->username }} 
											<span class="pull-right"> 
												{{ $comment->created_at->format('F jS Y \a\t g:ia') }} 
											</span>
										</h5>
									</div>
								</div>

								<div class="panel-body">
									<div class="col-sm-offset-1">
										{{ $comment->body }}
									</div>
								</div>

							</div>

						@endforeach

						<div class="row">
							<div class="col-sm-12">
								
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
												<a href="{{ URL::route('posts.index') }}" class="btn btn-success btn-xs">
													<span class="glyphicon glyphicon-backward"></span>
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
											<a href="{{ URL::route('posts.index') }}" class="btn btn-success btn-xs">
												<span class="glyphicon glyphicon-backward"></span>
											</a>
										</div>	
									</div>	
											
								@endif

							</div>

						</div>

					</div>

				</div>		
			</div>
		</div>

		<div class="col-md-3">
			@include('posts.partials.sidebar')
		</div>

	</div>

@stop