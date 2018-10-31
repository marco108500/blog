<?php

use Illuminate\Support\Facades\Route;



//Posts
Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create','PostsController@create');
Route::post('/posts','PostsController@store');
Route::get('/posts/{post}','PostsController@show');

//Comments
Route::post('/posts/{post}/comments','CommentsController@store');


//Register
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');


//login and logout
Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');





