@extends('layouts.default')

@section('content')

	@if (Session::has('flash_message'))
		<div class="alert alert-success">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	<h1>List of all resources</h1>
	
	<ul class="list-group">
       <li class="list-group-item green-heading">Resources</li>

	@if (!count($resources))
		<li class="list-group-item">No resource yet.</li>
	@else
		@foreach ($resources as $resource)
			<li class="list-group-item">
				<h4>{{ link_to_action('ResourcesController@show',
					$resource->title, ['id' => $resource->id],
					$attributes = array()); }}</h4>
				<small>Posted by {{ link_to_route('profile.show',
				 		$resource->user->username, 
				 	['username' => $resource->user->username]) }}</small>
			</li>
		@endforeach
	@endif

</ul>

	@if (Auth::check())
		{{ link_to_action('ResourcesController@create', 'Add a new resource', $parameters = array(), $attributes = array('class' => 'btn btn-lg btn-primary', 'role'=>'button')); }}
	@endif
@stop