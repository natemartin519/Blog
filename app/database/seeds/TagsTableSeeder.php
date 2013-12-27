<?php

class TagsTableSeeder extends Seeder {

	public function run()
	{
		Tag::truncate();

		Tag::create(['name' => 'Programming']);
		Tag::create(['name' => 'PHP']);
		Tag::create(['name' => 'Laravel']);
		Tag::create(['name' => 'Running']);
		Tag::create(['name' => 'Dogs']);
	}
}
