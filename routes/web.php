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

Route::get('/home', 'ProjectController@listProject');

Route::get('/add-project', 'ProjectController@index');

Route::post('create-project', ['as' => 'project.create', 'uses' => 'ProjectController@createProject']);
Route::get('list-project', ['as' => 'project.list', 'uses' => 'ProjectController@listProject']);

Route::get('/view-project', 'ProjectController@view');

Route::get('/message-board', 'ProjectController@message');

Route::get('/add-todo-list', 'ProjectController@addTodolist');

Route::get('/view-todo-list', 'ProjectController@viewTodolist');

Route::get('/bootstrap', function () {
    return view('firstbootstrap');
});
