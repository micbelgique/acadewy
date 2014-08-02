@extends('layouts.default')

@section('content')
 c'est l'index des catégories
 
 @foreach($categories as $categorie)
 	<br />{{$categorie->name}}
 @endforeach
@stop