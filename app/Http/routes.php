<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

  Route::get('/', 'HomeController@index');
Route::get('/user','PostsController@user');

Route::get('posts', 'PostsController@index');
Route::get('posts/{id}', 'PostsController@show');

Route::group(['middleware' => 'auth'], function () {
  Route::get('posts/create', 'PostsController@create');
  Route::post('posts', 'PostsController@store');
  Route::get('posts/{id}', 'PostsController@update');
  Route::delete('posts/{id}', 'PostsController@destroy');


  Route::post('/posts/{id}/comments', 'CommentsController@store');
  Route::get('comments/{id}', 'CommentsController@update');
  Route::delete('comments/{id}', 'CommentsController@destroy');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
});
