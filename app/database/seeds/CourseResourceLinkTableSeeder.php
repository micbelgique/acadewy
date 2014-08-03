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

		$resource1 = Resource::where('title', 'Res Title 1')->FirstOrFail();
		$resource2 = Resource::where('title', 'Res Title 2')->FirstOrFail();

		$course1 = Course::where('title', 'Course title 1')->FirstOrFail();

		CourseResourceLink::create(array(
			'resource_id' => $resource1->id,
			'course_id' => $course1->id,
			'order' => 1,
			)
		);

		CourseResourceLink::create(array(
			'resource_id' => $resource2->id,
			'course_id' => $course1->id,
			'order' => 2,
			)
		);
	}
}