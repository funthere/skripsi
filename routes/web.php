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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'ProjectController@listProject');

Route::get('/add-project', 'ProjectController@index');

Route::post('create-project', ['as' => 'project.create', 'uses' => 'ProjectController@save']);
Route::get('list-project', ['as' => 'project.list', 'uses' => 'ProjectController@listProject']);

Route::get('/view-project/{id}', 'ProjectController@view');

Route::get('/view-project-team', 'ProjectController@viewTeam');

Route::get('/message-board/{id}', ['as' => 'message-board.create', 'uses' => 'ProjectController@message']);
Route::post('/message-board/{id}', ['as' => 'message-board.save', 'uses' => 'ProjectController@messageSave']);

Route::get('/view-todo-list/{project_id}', ['as' => 'task.list', 'uses' => 'TaskController@viewTodolist']);
Route::get('/add-todo-list/{project_id}', ['as' => 'task.create', 'uses' => 'TaskController@addTodolist']);
Route::post('/add-todo-list/{project_id}', ['as' => 'task.save', 'uses' => 'TaskController@saveTodolist']);

Route::get('/view-todo-list/{id}', 'TaskController@viewTodolist');

Route::get('/upload-project', 'ProjectController@upload');

Route::get('/download-project', 'ProjectController@download');

Route::get('/chatting', 'ProjectController@chatting');

Route::get('/clearing-chat', 'ProjectController@clearing');

Route::get('/bootstrap', function () {
    return view('firstbootstrap');
});

Route::get('/tags', function () {
    return view('tags');
});
Route::get('/users/find', 'UserController@find');
