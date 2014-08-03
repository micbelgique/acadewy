@extends('layouts.default')

@section('content')
   <h1>Edit a course</h1>
   
   {{ Form::model($course, ['method' => 'PUT', 'route' => ['courses.update', $course->id]]) }}

   @if (Session::has('flash_message'))
      <div class="alert alert-danger">
         <p>{{ Session::get('flash_message') }}</p>
      </div>
   @endif

   <div class="form-group">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
      {{ $errors->first('title', '<span class="error">:message</span>') }}
   </div>

   <div class="form-group">
      {{ Form::label('description', 'Description:') }}
      {{ Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) }}
      {{ $errors->first('description', '<span class="error">:message</span>') }}
   </div>

   <div class="form-group">
      {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
   </div>
   
   {{ Form::close() }}

@stop