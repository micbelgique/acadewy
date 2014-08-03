@extends('layouts.default')

@section('content')

	@if (Session::has('flash_message'))
		<div class="alert alert-success">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	@if (Auth::id() === $resource->user_id)
	<div style="float:right;margin-left:1em;">
		{{ link_to_action('ResourcesController@edit', 'Edit', $parameters = array('id' => $resource->id), $attributes = array('class' => 'btn btn-sm btn-primary', 'role'=>'button')); }}
		{{ link_to_action('ResourcesController@destroy', 'Delete', $parameters = array('id' => $resource->id), $attributes = array('class' => 'btn btn-sm btn-danger', 'role'=>'button')); }}
	</div>
	@endif

	@if(Auth::check())

{{-- The following part should be refactored later on --}}
	<div style="text-align:right;float:right">

			<a href="{{ action('ResourcesController@mark',
				$parameters = array('id' => $resource->id, 'adjective' => 'favorited')) }}">
			@if((isset($resource->user_resource_link->favorited))
				AND ($resource->user_resource_link->favorited == 1))
				<img src="/assets/img/star.png" style="width:30px;"/>
			@else
				<img src="/assets/img/star.png" style="width:30px;opacity:0.5"/>
			@endif
			</a>
			
			<a href="{{ action('ResourcesController@mark',
				$parameters = array('id' => $resource->id, 'adjective' => 'wishlisted')) }}">
			@if((isset($resource->user_resource_link->wishlisted))
				AND ($resource->user_resource_link->wishlisted == 1))
				<img src="/assets/img/suivre.png" style="width:30px;"/>
			@else
				<img src="/assets/img/suivre.png" style="width:30px;opacity:0.5"/>
			@endif
			</a>

			<a href="{{ action('ResourcesController@mark',
				$parameters = array('id' => $resource->id, 'adjective' => 'completed')) }}">
			@if((isset($resource->user_resource_link->completed))
				AND ($resource->user_resource_link->completed == 1))
				<img src="/assets/img/vu.png" style="width:30px;"/>
			@else
				<img src="/assets/img/vu.png" style="width:30px;opacity:0.5"/>
			@endif
			</a>


	
	</div>
{{-- End of the part that should be refactored --}}

	@endif

	<h1>{{ $resource->title }}</h1>

	<div class="well well-sm">
		<strong>Link</strong><br/>
		<a href="{{ $resource->link }}" target="_blank">{{ $resource->link }}</a>
	</div>
	
	<h2>About this resource</h2>
	<p><em>{{ $resource->description }}</em></p>

	<p style="text-align:right">
		posted by {{ link_to_route('profile.show',
			$resource->user->username, 
		 	['username' => $resource->user->username]) }}</p>
		
@stop