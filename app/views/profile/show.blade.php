@extends('layouts.default')

@section('content')



<ol class="breadcrumb">
   	<li><a href="/">Home</a></li>
    <li class="active"><a href="#">{{ $user->profile->firstname . "." . $user->profile->lastname }}</a></li>	
</ol>

	@if((Auth::check()) AND ($user->id === Auth::user()->id))
		<h1>My profile <small>({{ $user->username }})</small> {{ link_to_route('profile.edit', 'Edit my profile',
			null, ['class' => 'btn btn-primary btn-lg'])}}</h1>
	@else
		<h1>{{ $user->username }}'s profile</h1>
	@endif

	<div class="container">
	
		<h2>Real name</h2>
		<p>{{ $user->profile->firstname }} {{ $user->profile->lastname }}</p>

		<h2>Email</h2>
		<p>{{ $user->email }}</p>

		<h2>Age</h2>
		<p>{{ getAge($user->profile->birthday) }}</p>

		<h2>Location</h2>
		<p>{{ $user->profile->location }}</p>

		<h2>Description</h2>
		<p>{{ $user->profile->description }}</p>

	</div>

	
@stop