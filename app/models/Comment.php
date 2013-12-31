<?php

class Comment extends Eloquent 
{
	protected $fillable = array('body', 'user_id', 'post_id');

	public $errors;
	public static $rules = array(
		'body' => 'required',
		'user_id' => 'required|exists:users,id',
		'post_id' => 'required|exists:posts,id'
	);

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function post()
	{
		return $this->belongsTo('Post');
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

	public static function all($userID = null)
	{
		if (isset($userID)) {
			return parent::where("user_id", $userID)->with('user', 'post')->get();
		}

		return parent::with('user', 'post')->get();
	}
}