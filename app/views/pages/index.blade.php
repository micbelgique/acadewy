@extends('layouts.default')

@section('content')
	
	<div class="jumbotron">
      <div class="container">

        {{ Auth::check()
        	? '<h1>Welcome <strong>' . Auth::user()->username . '</strong>!</h1>
        		<h2>You are now logged in <small> (' . Auth::user()->email . ') </small> </h2>'
        		: '<h1>Welcome, visitor!</h1>
        		<h2>You are NOT logged in.</h2>' }}
        

        <p>The purpose of this boilerplate is to help you save time building your laravel app.</p>
        <p>It comes with:</p>
        <ul>
            <li>Bootstrap template</li>
            <li>User registration and login</li>
            <li>Default PagesController for static pages (ex: "About" in the menu)</li>
        </ul>
     	
     	@if(Auth::guest())
     		<p>
                <a class="btn btn-primary btn-lg" role="button" href="register">Register now</a>
                <a class="btn btn-success btn-lg" role="button" href="login">Log in</a>

     	@endif
  
      </div>
    </div>

@stop