@extends('layouts.default')

@section('content')
	<h1>Registered users</h1>

	<ul>
      @foreach($users as $user)
        <li>{{ link_to_route('profile.show',
          $user->username,  ['username' => $user->username])}}
          <small>({{ $user->profile->location }})</small></li>
      @endforeach
    </ul>
@stop