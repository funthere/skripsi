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
Route::get('/register', 'Auth\RegisterController@create');
Route::post('/register-user', 'Auth\RegisterController@createUser');
Route::get('/change-password', 'UserController@changePassword');
Route::post('/save-password', 'UserController@savePassword');
Route::get('/list-user', 'UserController@listUser');

Auth::routes();


Route::get('/home', 'ProjectController@listProject');

Route::get('/app', 'ProjectController@app');

Route::get('/main/{project_id}', 'ProjectController@main');

Route::get('/add-project', 'ProjectController@index');

Route::post('create-project', ['as' => 'project.create', 'uses' => 'ProjectController@save']);
Route::get('list-project', ['as' => 'project.list', 'uses' => 'ProjectController@listProject']);

Route::get('/view-project/{id}', ['as' => 'project.view', 'uses' => 'ProjectController@view']);

Route::get('/view-project-team', 'ProjectController@viewTeam');

Route::get('/message-board/{id}', ['as' => 'message-board.create', 'uses' => 'ProjectController@messageBoard']);
Route::post('/message-board/{id}', ['as' => 'message-board.save', 'uses' => 'ProjectController@messageBoardSave']);

Route::get('/view-sprint/{project_id}', ['as' => 'sprint.list', 'uses' => 'SprintController@viewSprint']);
Route::get('/add-sprint/{project_id}', ['as' => 'sprint.add', 'uses' => 'SprintController@addSprint']);
Route::get('/delete-sprint/{task_id}', ['as' => 'sprint.delete', 'uses' => 'SprintController@delete']);
// Route::post('/add-sprint/{project_id}', ['as' => 'sprint.save', 'uses' => 'SprintController@saveSprint']);

Route::get('/view-todo-list/{project_id}', ['as' => 'task.list.member', 'uses' => 'TaskController@viewTaskMember']);
Route::get('/view-todo-list/{project_id}/{sprint_id}', ['as' => 'task.list', 'uses' => 'TaskController@viewTask']);
Route::get('/add-todo-list/{project_id}/{sprint_id}', ['as' => 'task.create', 'uses' => 'TaskController@addTask']);
Route::post('/add-todo-list/{project_id}/{sprint_id}', ['as' => 'task.save', 'uses' => 'TaskController@saveTask']);
Route::get('/edit-todo-list/{task_id}', ['as' => 'task.edit', 'uses' => 'TaskController@editTask']);
// Route::get('/change-status-task/{task_id}', ['as' => 'task.changestatus', 'uses' => 'TaskController@changeStatus']);
Route::get('/delete-task/{task_id}', ['as' => 'task.delete', 'uses' => 'TaskController@delete']);
Route::get('/get-member-task-ajax', ['as' => 'task.member-task', 'uses' => 'TaskController@memberTaskAjax']);
Route::get('/change-status-ajax', ['as' => 'task.changestatus.ajax', 'uses' => 'TaskController@changeStatus']);

Route::get('/view-todo-list/{id}', 'TaskController@viewTodolist');

Route::get('/view-project-upload/{project_id}', ['as' => 'document.view', 'uses' => 'ProjectDocumentController@upload']);
Route::post('/view-project-upload/{project_id}', 'ProjectDocumentController@uploadSave');

Route::get('/view-project-download/{project_id}', 'ProjectDocumentController@download');
Route::delete('/delete-file/{file_id}', ['as' => 'document.delete', 'uses' => 'ProjectDocumentController@deleteFile']);

Route::get('/chatting/{project_id}', ['as' => 'chat.chatting', 'uses' => 'ChatController@chatting']);

Route::get('/clearing-chat', 'ProjectController@clearing');
Route::get('/users/find', 'UserController@find');
Route::get('/test', 'ProjectController@test');

Route::post('get-file', ['as' => 'download', 'uses' => 'ProjectDocumentController@getFile']);
Route::get('chat-send', ['as' => 'chat.send', 'uses' => 'ChatController@sendChat']);
