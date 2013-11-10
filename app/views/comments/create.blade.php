@extends ('layout.master')

@section('content')

<h1>Create Comments</h1>

{{ Form::open(array('route' => 'comments.store')) }}
<ul>
	<li>
		{{ Form::label('user_id', 'Author:') }}
		{{ Form::text('user_id') }}		
	</li>
	<li>
		{{ Form::label('post_id', 'Post:') }}
		{{ Form::text('post_id') }}		
	</li>	
	<li>
		{{ Form::label('body', "Body:") }}
		{{ Form::textarea('body') }}
	</li>
	<li>
		{{ Form::submit('Submit', array('class' => 'btn btn-success'))}}
	</li>
</ul>

@if($errors->any())
<ul>
	{{ inplode('', $errors->all('<li class="error">:message</li>')) }}
</ul>

@endif

@stop