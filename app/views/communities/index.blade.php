@extends('layouts.default')

@section('content')
	<h1>Join our communities !</h1>

	<ul>

 	@foreach($communities as $community)

 		<li>{{link_to_action('CategoriesController@show', $community->name, $parameters = array($community->id), $attributes = array())}}</li>

 	@endforeach

 	</ul>
@stop