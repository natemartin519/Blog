@extends('layouts.master')		

@section('content')
	<div class="row">
		<div class="well">
			<div class="page-header">
				@yield('title')
			</div>

			@yield('body')

		</div>
	</div>
@stop