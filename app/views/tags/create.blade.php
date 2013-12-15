@extends ('layouts.master')

@section('content')

	<h1>Create Tag</h1>
	{{ Form::open(array('route' => 'tags.store')) }}
		<ul>
			<li>
				{{ Form::label('name', 'Tag:') }}
				{{ Form::text('name') }}		
			</li>
			<li>
				{{ Form::submit('Submit', array('class' => 'btn btn-success'))}}
			</li>
		</ul>
	{{ Form::close() }}

@stop