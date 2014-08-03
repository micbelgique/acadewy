@extends('layouts.default')

@section('content')
   <div class="container row">
      <div class="col-md-4 col-md-offset-4">
         <h1>Edit the order of a resourceLink</h1>         
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
      </div>
   </div>
@stop