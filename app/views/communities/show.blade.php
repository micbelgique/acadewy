@extends('layouts.default')

@section('content')

	<h1>Categories</h1>
 	
 	<ul>

 	@foreach($categories as $categorie)
 		<li>{{$categorie->name}}</li>
 	@endforeach

 	</ul>
@stop