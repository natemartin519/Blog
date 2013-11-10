@extends('layout.master')

@section('content')

<h1>Edit Tag</h1>
{{ Form::model($tag, array('method' => 'PATCH', 'route' => array('tags.update', $tag->id))) }}

<ul>
	<li>
		{{ Form::label('name', 'Tag:') }}
		{{ Form::text('name') }}		
	</li>
	<li>
		{{ Form::submit('Update', array('class' => 'btn btn-success')) }}
		{{ link_to_route('tags.index', 'Cancel', null, array('class' => 'btn btn-warning')) }}
	</li>
</ul>
{{ Form::close() }}

@if($errors->any())
<ul>
	{{ inplode('', $errors->all('<li class="error">:message</li>')) }}
</ul>

@endif


@stop