@if($errors->any())
	<div class="row">		
		<div class="alert alert-danger alert-dismissable">
			<a href="#" class='close' data-dismiss='alert' aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
			</a>
			<ul>{{ implode('', $errors->all('<li class="danger">:message</li>')) }}</ul>
		</div>
	</div>	
@endif

@if (Session::has('message'))
	<div class="row">
		<div class="alert alert-info alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-hidden="true">
				<span class="glyphicon glyphicon-remove"></span>
			</a>
			<p>{{ Session::get('message') }}</p>			
		</div>
	</div>

	{{ Session::forget('message') }}
@endif