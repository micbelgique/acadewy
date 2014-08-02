@extends('layouts.default')

@section('content')
 c'est l'index des communities
 
 @foreach($communities as $communitie)
 	<br />{{$communitie->name}}
 @endforeach
@stop