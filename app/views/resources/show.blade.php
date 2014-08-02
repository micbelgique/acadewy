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
	
{{-- The following part should be refactored later on --}}

	@if((isset($resource->user_resource_link->favorited))
		AND ($resource->user_resource_link->favorited == 1))
			You starred this!
			{{ link_to_action('ResourcesController@mark', 'Un-star',
				$parameters = array('id' => $resource->id, 'adjective' => 'favorited'),
				$attributes = array('class' => 'btn btn-xs btn-danger', 'role'=>'button')); }}
	@else
		{{ link_to_action('ResourcesController@mark', 'Star this',
			$parameters = array('id' => $resource->id, 'adjective' => 'favorited'),
			$attributes = array('class' => 'btn btn-xs btn-success', 'role'=>'button')); }}
	@endif
	
	<br/>

	@if((isset($resource->user_resource_link->wishlisted))
		AND ($resource->user_resource_link->wishlisted == 1))
			You added this to your "wishlist"!
			{{ link_to_action('ResourcesController@mark', 'Remove',
				$parameters = array('id' => $resource->id, 'adjective' => 'wishlisted'),
				$attributes = array('class' => 'btn btn-xs btn-danger', 'role'=>'button')); }}
	@else
		{{ link_to_action('ResourcesController@mark', 'Add to wishlist',
			$parameters = array('id' => $resource->id, 'adjective' => 'wishlisted'),
			$attributes = array('class' => 'btn btn-xs btn-success', 'role'=>'button')); }}
	@endif

	<br/>

	@if((isset($resource->user_resource_link->completed))
		AND ($resource->user_resource_link->completed == 1))
			You have mark this as completed!
			{{ link_to_action('ResourcesController@mark', 'Cancel',
				$parameters = array('id' => $resource->id, 'adjective' => 'completed'),
				$attributes = array('class' => 'btn btn-xs btn-danger', 'role'=>'button')); }}
	@else
		{{ link_to_action('ResourcesController@mark', 'Mark as completed',
			$parameters = array('id' => $resource->id, 'adjective' => 'completed'),
			$attributes = array('class' => 'btn btn-xs btn-success', 'role'=>'button')); }}
	@endif

{{-- End of the part that should be refactored --}}
		
@stop