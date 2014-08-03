<?php

class CourseTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('courses')->delete();

		$user1 = User::where('username', 'didier.toussaint')->FirstOrFail();
		$user2 = User::where('username', 'marc.ducobu')->FirstOrFail();

		Course::create(array(
			'user_id' => $user1->id,
			'description' => 'Desc for Blopblop blipblip bloupbloup',
			'title' => 'Course title 1'
		));

		Course::create(array(
			'user_id' => $user1->id,
			'description' => 'Desc for Blopblop blipblip bloupbloup',
			'title' => 'Course title 2'
		));
	}
}