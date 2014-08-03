<?php

class CoursesController extends \BaseController {

	/**
	 * Display a listing of the course.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();
		return View::make('courses.index')->with('courses', $courses);
	}


	/**
	 * Show the form for creating a new course.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('courses.create');
	}


	/**
	 * Store a newly created course in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('title', 'description');
		$rules = [
			'title' => 'required',
			'description' => 'required'
		];
		
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			$course = new Course($input);
			$user = Auth::user();
			$user->courses()->save($course);
			$user->save();
			return Redirect::route('courses.show', ['id' => $course->id])->withFlashMessage('Your course was successfully created!');
		}
		
		return Redirect::back()->withInput()->withErrors($validator);
	}


	/**
	 * Display the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::find($id);
		return View::make('courses.show')->with('course', $course);
	}


	/**
	 * Show the form for editing the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::find($id);

		if (Auth::id() !== ($course->user_id))
		{
			return 'You can not edit this course!';
		}

		return View::make('courses.edit')->with('course', $course);
	}


	/**
	 * Update the specified course in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('title', 'description');
		$rules = [
			'title' => 'required',
			'description' => 'required',
		];

		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			$course = Course::find($id);
			
			if (Auth::id() !== ($course->user_id))
			{
				return Redirect::back()->withInput()->withFlashMessage('You can not edit this course');
			}

			$course->title = Input::get('title');
			$course->description = Input::get('description');
			$course->save();

			// redirect
			return Redirect::route('courses.show', ['id' => $course->id])->withFlashMessage('The course was successfully edited!');
		}
		
		return Redirect::back()->withInput()->withErrors($validator);
	}


	/**
	 * Remove the specified course from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$course = Course::find($id);

		if (Auth::id() !== ($course->user_id))
		{
			return 'You can not delete this course';
			//return Redirect::back()->withInput()->withFlashMessage('You can not delete this course');
		}
		
		$course->delete();

		return Redirect::route('courses.index')->withFlashMessage('The course was successfully deleted!');
	}

	/**
	 * Show the form for creating a new resource link.
	 *
	 * @return Response
	 */
	public function createResourceLink($id) {
		$resources = Resource::all()->lists('title','id');
		return View::make('courses.createResourceLink')->with('resources', $resources)->with('courseId', $id);
	}

	/**
	 * Store a newly created resource link in storage.
	 *
	 * @return Response
	 */
	public function storeResourceLink($courseId) {
		$course = Course::find($courseId);
			
		if (Auth::id() !== ($course->user_id)) {
			return 'You can not edit this course!';
		}

		$storeResourceLinkMaxOrder = CourseResourceLink::where('course_id', $courseId)->max('order');

		$input = Input::only('resource');
		$rules = [
			'resource' => 'required'
		];
		
		$validator = Validator::make($input, $rules);

		if($validator->passes()) {
			courseResourceLink::create(array(
				'course_id' => $courseId,
				'resource_id' => Input::get('resource'),
				'order' => ($storeResourceLinkMaxOrder + 1)
				)
			);

			return Redirect::route('courses.show', ['id' => $courseId])->withFlashMessage('The resource was added to the course!');
		}
		
		return Redirect::back()->withInput()->withErrors($validator);
	}

	/**
	 * Remove a resource link 
	 *
	 * @param  int  $id The id of the resource link to delete
	 * @return Response
	 */
	public function destroyResourceLink($id) {
		$courseResourceLink = CourseResourceLink::find($id);

		if (Auth::id() !== ($courseResourceLink->course->user_id))
		{
			return 'You can not edit this course!';
		}

		$courseResourceLink->delete();

		return Redirect::route('courses.index')->withFlashMessage('The course was successfully deleted!');
	}

	/**
	 * Show the form for changing the order a resource link.
	 *
	 * @return Response
	 */
	public function editOrderResourceLink($id) {
		return View::make('courses.editOrderResourceLink')->with('id', $id);
	}

	/**
	 * Store a newly created resource link in storage.
	 *
	 * @return Response
	 */
	public function updateOrderResourceLink($id) {
		$input = Input::only('order');
		$rules = [
			'order' => 'required|integer'
		];
		
		$validator = Validator::make($input,$rules);

		if($validator->passes()) {
			$courseResourceLink = CourseResourceLink::find($id);
			$course = $courseResourceLink->course;

			if (Auth::id() !== ($course->user_id)) {
				return 'You can not edit this course!';
			}

			$storeResourceLinkMaxOrder  = CourseResourceLink::where('course_id', $course->id)->max('order');

			$newOrder = Input::get('order');
			$oldOrder = $courseResourceLink->order;

			if ($newOrder < 0 || $newOrder > $storeResourceLinkMaxOrder) {
				return 'Invalid order';
			}

			$courseResourceLinkAll = $course->courseResourceLink()->get();

			if($newOrder > $oldOrder) { 
				foreach ($courseResourceLinkAll as $l) {
					if($l->order > $oldOrder && $l->order <= $newOrder) {
						$l->order = $l->order - 1;
						$l->save();
					}
				}
			} else {
				foreach ($courseResourceLinkAll as $l) {
					if($l->order < $oldOrder && $l->order >= $newOrder) {
						$l->order = $l->order + 1;
						$l->save();
					}
				}
			}

			$courseResourceLink->order = $newOrder;
			$courseResourceLink->save();

			return Redirect::route('courses.show', ['id' => $course->id])->withFlashMessage('The resource was added to the course!');
		}	
		return Redirect::back()->withInput()->withErrors($validator);
	}
}
