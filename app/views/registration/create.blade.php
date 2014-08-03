@extends('layouts.default')

@section('content')
	
	<h1>Register now!</h1>
	
	{{ Form::open(['route' => 'registration.store']) }}
	
	<div class="form-group">
		{{ Form::label('username', 'Username:') }}
		{{ Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('username', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('email', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('password', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('password_confirmation', 'Confirm password:') }}
		{{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Create account', ['class' => 'btn btn-lg btn-green']) }}
	</div>
	
	{{ Form::close() }}


@stop