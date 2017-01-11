<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/add-project', 'ProjectController@index');

Auth::routes();

Route::get('/view-project', 'ProjectController@view');

Auth::routes();

Route::get('/message-board', 'ProjectController@message');

Auth::routes();

Route::get('/add-todo-list', 'ProjectController@addTodolist');

Auth::routes();

Route::get('/view-todo-list', 'ProjectController@viewTodolist');