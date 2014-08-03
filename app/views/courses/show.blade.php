@extends('layouts.default')

@section('content')
	@if (Session::has('flash_message'))
		<div class="alert alert-success">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	@if (Auth::id() === $course->user_id)
		{{ link_to_action('CoursesController@edit', 'edit', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
		{{ link_to_action('CoursesController@destroy', 'destroy', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-danger', 'role'=>'button')); }}
	@endif

	<h1>{{ $course->title }}</h1>
	
	<p>{{ $course->description }}</p>

	<h2>Resources:</h2>

	@if(!count($course->course_resource_link))

		<p>No resources for this course.</p>

	@else
		<table>
			@foreach($course->course_resource_link as $l)
				<tr>
					<td>{{ $l->resource->title }}</td>
					<td>
						@if (Auth::id() === $course->user_id)
							{{ link_to_action('CoursesController@destroyResourceLink', 'delete', $parameters = array('id' => $l->id), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
							</td>
							<td>
							{{ link_to_action('CoursesController@editOrderResourceLink', 'change order', $parameters = array('id' => $l->id), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
						@else
							</td>
							<td>
						@endif
					</td>
				</tr>
			@endforeach
		</table>
	@endif

	@if (Auth::id() === $course->user_id)
		{{ link_to_action('CoursesController@createResourceLink', 'Add new resource', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
	@endif

	<p>posted by {{ $course->user->username }}</p>
@stop