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
Route::get('/register', 'RegistrationController@create')->before('guest');;
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

// User Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create'])->before('guest');
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

// Categories
Route::resource('categories', 'CategoriesController');

// Default controller for static pages
Route::get('/{page}', 'PagesController@show');
