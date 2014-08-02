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
		DB::table('profiles')->delete();

        $user = User::create(array(
        	'username' => 'didier.toussaint',
        	'email' => 'didier@glouglou.be',
        	'password' => '1234'
        	));

        $profile = Profile::create(array(
        	'firstname' => 'Didier',
	        'lastname' => 'Toussaint',
	        'birthday' => '1984-11-22 00:00:00',
	        'location' => 'Mons, Belgium',
	        'description' => 'I\'m a translator.',
	        'user_id' => $user->id
        	));

        $user2 = User::create(array(
        	'username' => 'mathias.biard',
        	'email' => 'matsou03@gmail.com',
        	'password' => '1234'
        	));

        $profile2 = Profile::create(array(
        	'firstname' => 'Mathias',
        	'lastname' => 'Biard',
        	'birthday' => '1990-03-08 00:00:00',
        	'location' => 'Mons, Belgium',
        	'description' => 'I\'m a mobile developer.',
        	'user_id' => $user2->id
        	));

        $user3 = User::create(array(
        	'username' => 'marc.ducobu',
        	'email' => 'marc.ducobu@gmail.com',
        	'password' => '1234'
        	));

        $profile3 = Profile::create(array(
        	'firstname' => 'Marc',
        	'lastname' => 'Ducobu',
        	'birthday' => '1984-06-22 00:00:00',
        	'location' => 'Mons, Belgium',
        	'description' => 'I\'m a dreamer.',
        	'user_id' => $user3->id
        	));

        
	}
}
