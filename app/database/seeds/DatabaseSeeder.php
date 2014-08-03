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
		$this->call('CategoriesSeeder');
		$this->call('ResourceTableSeeder');
		$this->call('CourseTableSeeder');
		$this->call('CourseResourceLinkTableSeeder');
		$this->call('RoleTableSeeder');
		$this->call('RoleUserTableSeeder');
	}

}
