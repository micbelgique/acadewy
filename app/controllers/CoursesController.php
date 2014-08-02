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


}
