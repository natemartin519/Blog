<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		Tag::truncate();

		// The admin
		Tag::create([
			'username' 		=> 'natemartin',
			'email' 		=> 'natemartin@gmail.com',
			'password' 		=> 'admin',
			'access_level' 	=> '1'
		]);

		// An user
		Tag::create([
			'username' 		=> 'bob',
			'email' 		=> 'bob@bob.com',
			'password' 		=> 'bob',
			'access_level' 	=> '0'			
		]);
	}

}
