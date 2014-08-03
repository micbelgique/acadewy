<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Home page
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

// User registration
Route::get('register', ['as' => 'register', 'uses' => 'RegistrationController@create']);
Route::post('register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

// User Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

// Resources
Route::get('resources/{id}/mark/{adjective}', 'ResourcesController@mark');
Route::resource('resources', 'ResourcesController');

// Courses
Route::resource('courses', 'CoursesController');

// Categories
Route::resource('categories', 'CategoriesController');

// Communities
Route::resource('communities', 'CommunitiesController');

// User profiles
Route::get('profile/edit', 'ProfilesController@edit')->before('auth');
Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfilesController@update'])->before('auth');
Route::resource('profile', 'ProfilesController', ['only' => ['index', 'show', 'edit', 'update']]);

// Default controller for static pages
Route::get('/{page}', 'PagesController@show');
