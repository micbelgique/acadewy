@extends('layouts.default')

@section('content')
	<h1>Log In</h1>

    {{ Form::open(['route' => 'sessions.store']) }}
		
		@if (Session::has('flash_message'))
        	<div class="alert alert-danger">
            	<p>{{ Session::get('flash_message') }}</p>
        	</div>
    	@endif
        
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
            {{ $errors->first('email', '<span class="error">:message</span>') }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
			{{ $errors->first('password', '<span class="error">:message</span>') }}
        </div>
        
        <div class="form-group">
            {{ Form::submit('Log In', ['class' => 'btn btn-lg btn-green']) }}
        </div>

    {{ Form::close() }}
@stop