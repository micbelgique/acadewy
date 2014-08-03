@extends('layouts.default')

@section('content')

	<h1>Categories</h1>

		<ul class="list-group">
			<li class="list-group-item" style="background-color:#87c656;color:white;font-weight:bold;text-align:center">
				Sub-categories</li>
			{{ $categoriesTreeHtml }}
		</ul>

	<ul class="list-group">
		<li class="list-group-item green-heading">Lastest resources</li>

		@if (!count($resources))
			<li class="list-group-item">No resource yet.</li>
		@else
			@foreach ($resources as $resource)
				<li class="list-group-item">
					{{ link_to_action('ResourcesController@show',
						$resource->title, ['id' => $resource->id],
						$attributes = array()); }}
					<small>(Posted by {{ link_to_route('profile.show',
							$resource->user->username, 
						['username' => $resource->user->username]) }})</small>
				</li>
			@endforeach
		@endif
	</ul>

	<ul class="list-group">
		<li class="list-group-item green-heading">Lastest courses</li>

		@if (!count($courses))
			<li class="list-group-item">No course yet.</li>
		@else
			@foreach ($courses as $course)
				<li class="list-group-item">
					{{ link_to_action('CoursesController@show',
						$course->title, ['id' => $course->id],
						$attributes = array()); }}
					<small>(Created by {{ link_to_route('profile.show',
							$course->user->username, 
						['username' => $course->user->username]) }})</small>
				</li>
			@endforeach
		@endif
	</ul>
	 
@stop