@extends('layouts.default')

@section('content')

   @if (Session::has('flash_message'))
      <div class="alert alert-success">
         <p>{{ Session::get('flash_message') }}</p>
      </div>
   @endif

   <h1>Courses list</h1>

   @if (!count($courses))
      <p>No course</p>
   @else
      <ul>
         @foreach ($courses as $course)
            <li>
               {{ link_to_action('CoursesController@show', $course->title, $parameters = array('id' => $course->id), $attributes = array()); }}
            </li>
         @endforeach
      </ul>
   @endif

   @if (Auth::check())
      {{ link_to_action('CoursesController@create', 'create a new course', $parameters = array(), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
   @endif
@stop