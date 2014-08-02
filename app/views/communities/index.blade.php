@extends('layouts.default')

@section('content')
 c'est l'index des communities
 
 @foreach($communities as $community)
 	<br /> 
 	{{link_to_action('CategoriesController@show', $community->name, $parameters = array($community->id), $attributes = array())}}
 @endforeach
@stop