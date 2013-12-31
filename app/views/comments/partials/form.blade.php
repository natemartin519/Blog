{{ Form::hidden('user_id', isset($comment->user_id) ? $comment->user_id : Auth::user()->id) }}
{{ Form::hidden('post_id', isset($comment->post_id) ? $comment->post_id : $post_id) }}

<div class="form-group">
	{{ Form::label('body', "Body:", array('class' => 'col-sm-2 control-label')) }}

	<div class="col-sm-8">
		{{ Form::textarea('body', isset($comment->body) ? $comment->body : null, array('placeholder' => 'Enter your comment', 'class' => 'form-control')) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-8">
		{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
		{{ HTML::linkRoute('comments.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
	</div>
</div>