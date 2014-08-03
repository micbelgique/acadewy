@extends('layouts.default')

@section('content')

   @if (Session::has('flash_message'))
      <div class="alert alert-success alert-dismissible">
         <p>{{ Session::get('flash_message') }}</p>
      </div>
   @endif

   <ul class="list-group">
      <li class="list-group-item green-heading"><h1>List of all courses</h1></li>

   @if (!count($courses))
      <li class="list-group-item">No resource yet.</li>
   @else
       @foreach ($courses as $course)
            <li class="list-group-item">
               <h4>{{ link_to_action('CoursesController@show', $course->title, $parameters = array('id' => $course->id), $attributes = array()); }}</h4>
               <small>Created by {{ link_to_route('profile.show',
                  $course->user->username, 
               ['username' => $course->user->username]) }}</small>
            </li>
         @endforeach
   @endif
   </ul>

   @if (Auth::check())
      {{ link_to_action('CoursesController@create',
         'Create a new course', null,
         $attributes = array('class' => 'btn btn-lg btn-primary', 'role'=>'button')); }}
   @endif
@stop