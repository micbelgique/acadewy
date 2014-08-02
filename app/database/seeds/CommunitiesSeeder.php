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

        Community::create(array(
        	'name' => 'Programmation',
        	'description' => 'Catégorie Programmation'
        	));

        Community::create(array(
        	'name' => 'Cuisine',
        	'description' => 'Catégorie cuisine'
        	));

        Community::create(array(
        	'name' => 'Nature',
        	'description' => 'Catégorie Nature'
        	));
	}
}
