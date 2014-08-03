@extends('layouts.default')

@section('content')
   <div class="container row">
      <div class="col-md-4 col-md-offset-4">
         <h1>Create a new resourceLink</h1>         
         {{ Form::open(['route' => ['courses.storeResourceLink', $courseId]]) }}

         <div class="form-group">
            {{ Form::label('resource', 'Resource:') }}
            {{ Form::select('resource', $resources) }}
            {{ $errors->first('resource', '<span class="error">:message</span>') }}
         </div>

         <div class="form-group">
            {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
         </div>
         
         {{ Form::close() }}
      </div>
   </div>
@stop