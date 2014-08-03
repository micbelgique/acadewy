@extends('layouts.default')

@section('content')
	<h1>Create categorie</h1>
	
	{{ Form::open(['route' => 'categories.store']) }}
	
	<div class="form-group">
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('name', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description:') }}
		{{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) }}
		{{ $errors->first('description', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('parent_id', 'Parent categorie:') }}
		{{ Form::select('parent_id', $categories) }}
		{{ $errors->first('parent_id', '<span class="error">:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::submit('Create categorie', ['class' => 'btn btn-primary']) }}
	</div>
	
	{{ Form::close() }}

@stop