@extends('layouts.default')

@section('content')

	<h1>Edit my profile </h1>

	{{ Form::model($user->profile, ['method' => 'PUT', 'route' => 'profile.update']) }}
	
	<div class="form-group">
		{{ Form::label('firstname', 'First name:') }}
		{{ Form::text('firstname', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('lastname', 'Last name:') }}
		{{ Form::text('lastname', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('birthday', 'Date of birth:') }}
		{{ Form::text('birthday', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('location', 'Location:') }}
		{{ Form::text('location', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description:') }}
		{{ Form::textarea('description', null, ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Update profile', ['class' => 'btn btn-primary']) }}
	</div>

	{{ Form::close() }}


@stop