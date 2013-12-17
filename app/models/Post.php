<?php

class Post extends Eloquent 
{
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'header' => 'required',
		'body' => 'required',
		'status' => 'required'
	);

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tags()
	{
		return $this->belongsToMany('Tag');
	}	
}