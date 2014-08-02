<?php

class CoursesController extends \BaseController {

	/**
	 * Display a listing of the course.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		//
	}


	/**
	 * Update the specified course in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified course from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
