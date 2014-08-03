<?php

class CourseResourceLinkTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('courses_resources_link')->delete();

		$resource1 = Resource::where('title', 'PHP Documentation')->FirstOrFail();
		$resource2 = Resource::where('title', 'Laravel Quickstart')->FirstOrFail();
		$resource3 = Resource::where('title', 'Laracasts - Laravel video tutorials')->FirstOrFail();
		$resource4 = Resource::where('title', 'How to crack an egg - video')->FirstOrFail();

		$course1 = Course::where('title', 'Learn Laravel')->FirstOrFail();
		$course2 = Course::where('title', 'Cooking - basics')->FirstOrFail();

		CourseResourceLink::create(array(
			'resource_id' => $resource1->id,
			'course_id' => $course1->id,
			'order' => 3,
			)
		);

		CourseResourceLink::create(array(
			'resource_id' => $resource2->id,
			'course_id' => $course1->id,
			'order' => 1,
			)
		);

		CourseResourceLink::create(array(
			'resource_id' => $resource3->id,
			'course_id' => $course1->id,
			'order' => 2,
			)
		);

		CourseResourceLink::create(array(
			'resource_id' => $resource4->id,
			'course_id' => $course2->id,
			'order' => 1,
			)
		);
	}
}