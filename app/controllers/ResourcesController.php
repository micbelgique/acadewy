<?php

class ResourcesController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => ['index', 'show']));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resources = Resource::with('user')->get();
		return View::make('resources.index')->with('resources', $resources);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Categorie::all()->lists('name','id');
		return View::make('resources.create')->with('categories', $categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('link', 'description', 'level', 'title', 'categorie_id');
		$rules = [
			'title' => 'required',
			'link' => 'required|url',
			'description' => 'required',
			'level' => 'required|integer',
			'categorie_id' => 'required|integer'
		];
		
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			$resource = new Resource($input);
			$user = Auth::user();
			$user->resources()->save($resource);
			$user->save();
			return Redirect::route('resources.show', ['id' => $resource->id])->withFlashMessage('Your resource was successfully created!');
		}
		
		return Redirect::back()->withInput()->withErrors($validator);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$resource = Resource::with('UserResourceLink')->find($id);
		return View::make('resources.show')->with('resource', $resource);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$resource = Resource::find($id);

		if (Auth::id() !== ($resource->user_id))
		{
			return Redirect::back()->withFlashMessage('You cannot edit this resource');
		}

		return View::make('resources.edit')->with('resource', $resource);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('title', 'link', 'description', 'level');
		$rules = [
			'title' => 'required',
			'link' => 'required',
			'description' => 'required',
			'level' => 'required|integer'
		];

		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			$resource = Resource::find($id);
			
			if (Auth::id() !== ($resource->user_id))
			{
				return Redirect::back()->withInput()->withFlashMessage('You cannot edit this resource');
			}

			$resource->title = Input::get('title');
			$resource->link = Input::get('link');
			$resource->description = Input::get('description');
			$resource->level = Input::get('level');
			$resource->save();

			// redirect
			return Redirect::route('resources.show', ['id' => $resource->id])->withFlashMessage('The resource was successfully edited!');
		}
		
		return Redirect::back()->withInput()->withErrors($validator);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$resource = Resource::find($id);

		if (Auth::id() !== ($resource->user_id))
		{
			return 'You can not delete this resource';
			//return Redirect::back()->withInput()->withFlashMessage('You can not delete this resource');
		}
		
		$resource->delete();

		return Redirect::route('resources.index')->withFlashMessage('The resource was successfully deleted!');
	}

	public function mark($id, $adjective)
	{
		if(in_array($adjective, ['favorited', 'wishlisted', 'completed']))
		{
			$userResourceLink = UserResourceLink::firstOrNew(array(
				'user_id' => Auth::id(), 'resource_id' => $id));
			if((!isset($userResourceLink->{$adjective})) OR (! $userResourceLink->{$adjective})) {
				$userResourceLink->{$adjective} = 1;
			} else {
				$userResourceLink->{$adjective} = 0;
			}
			$userResourceLink->save();

			$resource = UserResourceLink::find($userResourceLink->id);
		}
		
		return Redirect::back();

	}

}
