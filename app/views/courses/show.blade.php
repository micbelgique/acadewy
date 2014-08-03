@extends('layouts.default')

@section('content')

	<ol class="breadcrumb">
   		<li><a href="/">Home</a></li>
   		<li><a href="#">{{ $course->title }}</a></li>
	</ol>

	@if (Session::has('flash_message'))
		<div class="alert alert-success alert-dixsissible">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	@if (Auth::id() === $course->user_id)
		<div style="float:right">
		{{ link_to_action('CoursesController@edit', 'edit', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-xs btn-primary', 'role'=>'button')); }}
		{{ link_to_action('CoursesController@destroy', 'destroy', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-xs btn-danger', 'role'=>'button')); }}
		</div>
	@endif

	<h1>{{ $course->title }}</h1>
		<p><em>Course created by {{ $course->user->username }}</em></p>
	
	<p>{{ $course->description }}</p>
	<hr>
	<div style="margin-left:2em">

	@if(!count($course->course_resource_link))

		<h2>No resource yet.</h2>

	@else
		@foreach($course->course_resource_link as $l)
		
			<h2>{{ $l->resource->title }}</h2>
			<div style="float:right;margin-left:1em">
				@if (Auth::id() === $course->user_id)
					{{ link_to_action('CoursesController@editOrderResourceLink', 'change order', $parameters = array('id' => $l->id), $attributes = array('class' => 'btn btn-xs btn-primary', 'role'=>'button')); }}
					{{ link_to_action('CoursesController@destroyResourceLink', 'delete', $parameters = array('id' => $l->id), $attributes = array('class' => 'btn btn-xs btn-danger', 'role'=>'button')); }}
				@endif
			</div>

			<div style="float:right">
				<a href="{{ action('ResourcesController@mark',
					$parameters = array('id' => $l->resource->id, 'adjective' => 'favorited')) }}">
				@if(Auth::check()
					AND (isset($l->resource->user_resource_link->favorited))
					AND ($l->resource->user_resource_link->favorited == 1))
						<img src="/assets/img/star.png" style="width:22px;" alt="Starred" />
				@else
						<img src="/assets/img/star.png" style="width:22px;opacity:0.5" alt="Not starred" />
				@endif
				</a>

				<a href="{{ action('ResourcesController@mark',
					$parameters = array('id' => $l->resource->id, 'adjective' => 'wishlisted')) }}">
				@if(Auth::check()
					AND (isset($l->resource->user_resource_link->wishlisted))
					AND ($l->resource->user_resource_link->wishlisted == 1))
						<img src="/assets/img/suivre.png" style="width:22px;" alt="Wishlisted" />
				@else
						<img src="/assets/img/suivre.png" style="width:22px;opacity:0.5" alt="Not wishlisted" />
				@endif
				</a>

				<a href="{{ action('ResourcesController@mark',
					$parameters = array('id' => $l->resource->id, 'adjective' => 'completed')) }}">
				@if(Auth::check()
					AND (isset($l->resource->user_resource_link->completed))
					AND ($l->resource->user_resource_link->completed == 1))
						<img src="/assets/img/vu.png" style="width:22px;" alt="Completed" />
				@else
						<img src="/assets/img/vu.png" style="width:22px;opacity:0.5" alt="Not Completed" />
				@endif
				</a>
			</div>
					
			<p><a href="{{ $l->resource->link }}" target="_blank">{{ $l->resource->link }}</a></p>

			<p>{{ $l->resource->description }}</p>
			<hr style="width:75%">
		@endforeach
	@endif

	</div>
	<div style="text-align:center;">
	@if (Auth::id() === $course->user_id)
		{{ link_to_action('CoursesController@createResourceLink', 'Add an existing resource', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
	@endif
	</div>
@stop