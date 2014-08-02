@extends('layouts.default')

@section('content')

	@if (Session::has('flash_message'))
		<div class="alert alert-success">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	@if (Auth::id() === $resource->user_id)
		{{ link_to_action('ResourcesController@edit', 'edit', $parameters = array('id' => $resource->id), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
		{{ link_to_action('ResourcesController@destroy', 'destroy', $parameters = array('id' => $resource->id), $attributes = array('class' => 'btn btn-danger', 'role'=>'button')); }}
	@endif

	<h1><a href="{{ $resource->link }}" target="_blank">{{ $resource->title }}</a></h1>
	
	<p>{{ $resource->description }}</p>

	<p>posted by {{ $resource->user->username }}</p>
	
	@if((isset($resource->user_resource_link->favorited)) AND ($resource->user_resource_link->favorited == 1))
		You starred this! {{ link_to_action('ResourcesController@mark', 'Un-star', $parameters = array('id' => $resource->id, 'adjective' => 'favorited'), $attributes = array('class' => 'btn btn-xs btn-danger', 'role'=>'button')); }}
	@else
		{{ link_to_action('ResourcesController@mark', 'Star this', $parameters = array('id' => $resource->id, 'adjective' => 'favorited'), $attributes = array('class' => 'btn btn-success', 'role'=>'button')); }}
	@endif
		
@stop