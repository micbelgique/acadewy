@extends('layouts.default')

@section('content')
	
	@if($user->id === Auth::user()->id)
		<h1>My profile <small>({{ $user->username }})</small></h1>
	@else
		<h1>{{ $user->username }}'s profile</h1>
	@endif

	<h2>Real name</h2>
	<p>{{ $user->profile->firstname or '-'}} {{ $user->profile->lastname }}</p>

	<h2>Email</h2>
	<p>{{ $user->email }}</p>

	<h2>Age</h2>
	<p>{{ getAge($user->profile->birthday) }}</p>

	<h2>Location</h2>
	<p>{{ $user->profile->location }}</p>

	<h2>Description</h2>
	<p>{{ $user->profile->description }}</p>
	
@stop