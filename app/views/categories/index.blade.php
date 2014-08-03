@extends('layouts.default')

@section('content')

	<h1>Categories</h1>
 	
 	<ul>

 	@foreach($categories as $categorie)
 		<li>{{$categorie->name}}</li>
 	@endforeach

 	</ul>

 	@if(Auth::check())
 		@if(Auth::user()->hasRole('admin'))
 			{{ link_to_action('CategoriesController@create',
 				'Add a new category', null,
 				$attributes = array('class' => 'btn btn-lg btn-primary', 'role'=>'button')); }}	
 		@endif
 	@endif
@stop