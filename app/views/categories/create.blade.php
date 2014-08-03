@extends('layouts.default')

@section('content')
	
	<div class="container row">
		<div class="col-md-4 col-md-offset-4">
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
				{{ Form::label('community_id', 'Community:') }}
				{{ Form::select('community_id', $communities) }}
				{{ $errors->first('community_id', '<span class="error">:message</span>') }}
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

		</div>

	</div>

@stop