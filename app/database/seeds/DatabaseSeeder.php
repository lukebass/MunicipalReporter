<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create(array(
			'admin' => 1,
			'username' => 'admin',
			'email' => 'it@princerupert.ca',
			'password' => Hash::make('@cprvp9kt')
		));
	}

}
