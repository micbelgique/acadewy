<?php

class ProfileTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('profiles')->delete();

		$user = User::where('username', 'admin')->FirstOrFail();

        Profile::create(array(
        	'firstname' => 'Didier',
        	'lastname' => 'Toussaint',
        	'birthday' => '1984-11-22 00:00:00',
        	'location' => 'Mons, Belgium',
        	'description' => 'Hopeless translator',
        	'user_id' => $user->id
        	));
	}

}
