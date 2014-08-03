@extends('layouts.default')

@section('content')

         <h1>Edit the order of a resource</h1>         
         {{ Form::open(['route' => ['courses.updateOrderResourceLink', $id]]) }}

         <div class="form-group">
            {{ Form::label('order', 'New order:') }}
            {{ Form::text('order', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{ $errors->first('order', '<span class="error">:message</span>') }}
         </div>

         <div class="form-group">
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
         </div>
         
         {{ Form::close() }}
@stop