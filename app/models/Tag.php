<?php

class Tag extends Eloquent 
{
	protected $fillable = array('name');

	public $timestamps = false;

	public static $rules = array('name' => 'required');
	public $errors;

	public function posts()
	{
		return $this->belongsToMany('Post');
	}

	public function isValid()
	{
		$validator = Validator::make($this->attributes, static::$rules);

		if ($validator->passes()) {
			return true;
		}

		$this->errors = $validator->messages();

		return false;
	}
}