<?php

class CommunitiesSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('communities')->delete();

        Communitie::create(array(
        	'name' => 'Programmation',
        	'description' => 'Catégorie Programmation'
        	));

        Communitie::create(array(
        	'name' => 'Cuisine',
        	'description' => 'Catégorie cuisine'
        	));

        Communitie::create(array(
        	'name' => 'Nature',
        	'description' => 'Catégorie Nature'
        	));
	}
}
