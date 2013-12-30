<?php

class PostTagsComposer {
	
	protected $tag;

	public function __construct(Tag $tag)
	{
		$this->tag = $tag;
	}

	public function compose($view)
	{
		$tags = $this->tag->all();
		$view->with('tags', $tags);
	}
}