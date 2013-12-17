<?php

class Comment extends Eloquent 
{
	protected $guarded = array();

	public static $rules = array(
		'body' => 'required',
		'user_id' => 'required',
		'post_id' => 'required'
	);

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function post()
	{
		return $this->belongsTo('Post');
	}
}