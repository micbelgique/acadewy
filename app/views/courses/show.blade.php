@extends('layouts.default')

@section('content')
   @if (Session::has('flash_message'))
      <div class="alert alert-success alert-dismissible">
         <p>{{ Session::get('flash_message') }}</p>
      </div>
   @endif

   @if (Auth::id() === $course->user_id)
      <div style="float:right">
      {{ link_to_action('CoursesController@edit', 'edit', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-sm btn-primary', 'role'=>'button')); }}
      {{ link_to_action('CoursesController@destroy', 'destroy', $parameters = array('id' => $course->id), $attributes = array('class' => 'btn btn-sm btn-danger', 'role'=>'button')); }}
      </div>
   @endif

   <h1>{{ $course->title }}</h1>
   
   <p>{{ $course->description }}</p>

   <p>posted by {{ $course->user->username }}</p>
@stop