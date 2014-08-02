@extends('layouts.default')

@section('content')
	
	<div class="jumbotron">
      <div class="container">

        {{ Auth::check()
        	? '<h1>Welcome <strong>' . Auth::user()->username . '</strong>!</h1>
        		<h2>You are now logged in <small> (' . Auth::user()->email . ') </small> </h2>'
        		: '<h1>Welcome, visitor!</h1>
        		<h2>You are NOT logged in.</h2>' }}
        

        <h2>Registered users</h2>
        <ul>
          @foreach($users as $user)
            <li>{{ link_to_route('profile.show',
              $user->username,  ['username' => $user->username])}}
              <small>({{ $user->profile->location }})</small></li>
          @endforeach
        </ul>

        <h2>Latest resources <small>({{ link_to_route('resources.index', 'View all') }})</small></h2>

         <ul>
            @foreach ($resources as $resource)
               <li>
                  {{ link_to_action('ResourcesController@show', $resource->link, $parameters = array('id' => $resource->id), $attributes = array()); }}
               </li>
            @endforeach
         </ul>
     	
     	@if(Auth::guest())
     		<p>
                <a class="btn btn-primary btn-lg" role="button" href="register">Register now</a>
                <a class="btn btn-success btn-lg" role="button" href="login">Log in</a>

     	@endif
  
      </div>
    </div>

@stop