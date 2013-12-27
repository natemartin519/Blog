<div class="panel panel-primary">
	<div class="panel-heading">
		<p class="panel-title">
			@if(Auth::check())
				{{ Auth::user()->username }}

				@if(Auth::user()->isAdmin()) 
					(Admin)
				@endif
			
			@else
				Tags

			@endif
		</p>
	</div>

 	@if (isset($post))
		<div class="panel-body">
			@foreach ($post->tags as $tag)
				{{ HTML::linkRoute('posts.index', $tag->name, array('tag' => $tag->id), array('class' => 'btn btn-info')) }}
			@endforeach
		</div>
		<hr>
	@endif 

	<div class="panel-body">
		@foreach ($tags as $tag)
			{{ HTML::linkRoute('posts.index', $tag->name, array('tag' => $tag->id), array('class' => 'btn btn-info')) }}
		@endforeach
	</div>

</div>