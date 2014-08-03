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
			'description' => 'Laravel is said to be a great framework. You should learn it.',
			'title' => 'Learn Laravel'
		));

		Course::create(array(
			'user_id' => $user2->id,
			'description' => 'This course will teach you the basics of cooking',
			'title' => 'Cooking - basics'
		));
	}
}