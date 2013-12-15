@extends('layouts.master')		

@section('content')
	<div class="row">
		<div class="well">
			<div class="page-header">
				<h2>@yield('header')</h2>
			</div>

			@yield('child_content')

		</div>
	</div>
@stop