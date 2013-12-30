<div class="form-group">
	{{ Form::label('name', 'Tag Name:', array('class' => 'col-sm-2 control-label')) }}

	<div class="col-sm-8">
		{{ Form::text('name', isset($tag->name) ? $tag->name : null, array('placeholder' => 'Tag', 'class' => 'form-control')) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-8">
		{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('tags.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	</div>
</div>