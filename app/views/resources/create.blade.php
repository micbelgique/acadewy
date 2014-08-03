@extends('layouts.default')

@section('content')

	<h1>Add a new resource</h1>
	
	{{ Form::open(['route' => 'resources.store']) }}

	<div class="form-group">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('title', '<span class="error">:message</span>') }}
	</div>
	
	<div class="form-group">
		{{ Form::label('link', 'Link:') }}
		{{ Form::text('link', null, ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('link', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description:') }}
		{{ Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('description', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('level', 'Level:') }}
		{{ Form::select('level',
			['1' => 'Beginner', '2' => 'Advanced', '3' => 'Expert'],
			null,
			['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('level', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::submit('Add the resource', ['class' => 'btn btn-lg btn-primary']) }}
	</div>
	
	{{ Form::close() }}
@stop