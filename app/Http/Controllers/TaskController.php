<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Illuminate\Support\Facades\Auth;
use View, Redirect;

class TaskController extends BaseController
{
    public $pageId = 3;
    public function __construct()
    {
        parent::__construct();
        View::share('pageId', $this->pageId);
    }

    public function viewTodoList($projectId)
    {
        $datas = Task::where(['project_id' => $projectId])->get();
        $datas = $datas->groupBy('sprint_id');
        // dd($datas);
        return view('list-task', ['datas' => $datas, 'projectId' => $projectId]);
    }

    public function addTodolist($projectId)
    {
        $project = Project::with('userProjects', 'tasks')->find($projectId);
        if (!$project) {
            // not found
        } else {
            $task = new Task;
            return view('add-todo-list', ['project' => $project, 'task' => $task]);
        }
    }

    public function saveTodolist($projectId)
    {
        $project = Project::find($projectId);
        $task = new Task;
        $task->project_id = $projectId;
        $task->sprint_id = 1; // masih hardcode
        $task->assigned_to = request('assigned_to');
        $task->activity = request('task_name');
        $task->deadline_datetime = request('deadline');
        $task->description = request('description');
        $result = $task->save();

        return Redirect::route('task.list', ['project' => $project])->with('status', 'Data successfully saved!');
    }
}
