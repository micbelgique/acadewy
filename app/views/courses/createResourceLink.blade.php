@extends('layouts.default')

@section('content')
         <h1>Add an existing resource to this course</h1>         
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
@stop