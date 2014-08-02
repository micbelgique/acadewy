<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();

        User::create(array(
        	'username' => 'admin',
        	'email' => 'admin@example.com',
        	// Password hashing is done by the setPasswordAttribute function in the User model
        	'password' => '1234'
        	));
	}
}
