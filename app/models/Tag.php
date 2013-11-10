<?php

class Tag extends Eloquent {
	protected $guarded = array();

	public static $rules = array('name' => 'required');

	public $timestamps = false;
}
