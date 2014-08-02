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
Route::get('register', ['as' => 'register', 'uses' => 'RegistrationController@create'])->before('guest');;
Route::post('register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

// User Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

// Resources
Route::get('resources/{id}/favorite', 'ResourcesController@favorite')->before('auth');
Route::get('resources/{id}/destroy', 'ResourcesController@destroy')->before('auth');
Route::get('resources/store', ['as' => 'resources.store', 'uses' => 'ResourcesController@store'])->before('auth');
Route::get('resources/update', ['as' => 'resources.update', 'uses' => 'ResourcesController@update'])->before('auth');
Route::get('resources/create', ['as' => 'resources.create', 'uses' => 'ResourcesController@create'])->before('auth');
Route::resource('resources', 'ResourcesController', ['except' => ['create', 'store', 'update']]);

// Courses
Route::get('courses/{id}/destroy', 'CoursesController@destroy')->before('auth');
Route::get('courses/store', ['as' => 'courses.store', 'uses' => 'CoursesController@store'])->before('auth');
Route::get('courses/update', ['as' => 'courses.update', 'uses' => 'CoursesController@update'])->before('auth');
Route::get('courses/create', ['as' => 'courses.create', 'uses' => 'CoursesController@create'])->before('auth');
Route::resource('courses', 'CoursesController', ['except' => ['create']]);

// Categories
Route::post('categories', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
Route::resource('categories', 'CategoriesController');

// Communities
Route::resource('communities', 'CommunitiesController');

// User profiles
Route::get('profile/edit', 'ProfilesController@edit')->before('auth');
Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfilesController@update'])->before('auth');
Route::resource('profile', 'ProfilesController', ['only' => ['index', 'show', 'edit', 'update']]);

// Default controller for static pages
Route::get('/{page}', 'PagesController@show');
