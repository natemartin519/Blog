<?php

class Tag extends Eloquent 
{
	protected $guarded = array();
	public $timestamps = false;

	public static $rules = array('name' => 'required|unique:name');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}