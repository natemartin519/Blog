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
}