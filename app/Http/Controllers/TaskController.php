<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\ProjectSprint;
use Illuminate\Support\Facades\Auth;
use View, Redirect;

class TaskController extends BaseController
{
    public $pageId = 3;
    public function __construct()
    {
        parent::__construct();
        View::share('pageId', $this->pageId);
        
        $url = request()->url();
        $projectId = (substr($url, -1));
        $array = (explode('/', $url));
        view()->share('projectId', $array[4]);
    }

    public function viewTodoList($projectId, $sprintId)
    {
        $datas = Task::where(['project_id' => $projectId, 'sprint_id' => $sprintId])->get();
        $datas = $datas->groupBy('sprint_id');
        // dd($datas);
        return view('task.list-task', ['datas' => $datas, 'projectId' => $projectId, 'sprintId' => $sprintId]);
    }

    public function addTodolist($projectId, $sprintId)
    {
        $project = Project::with('userProjects', 'sprints')->find($projectId);
        if (!$project) {
            // not found
        } else {
            $task = new Task;
            return view('task.add-todo-list', ['project' => $project, 'task' => $task, 'sprintId' => $sprintId]);
        }
    }

    public function saveTodolist($projectId, $sprintId)
    {
        $project = Project::find($projectId);
        $task = new Task;
        $task->project_id = $projectId;
        $task->sprint_id = $sprintId;
        $task->assigned_to = request('assigned_to');
        $task->activity = request('task_name');
        $task->deadline_datetime = request('deadline');
        $task->description = request('description');
        $result = $task->save();

        return redirect()->route('task.list', ['project_id' => $project->id, 'sprint_id' => $sprintId])->with('status', 'Data successfully saved!');
    }

    public function changeStatus($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            if ($task->status == Task::STATUS_ACTIVE) {
                $task->status = Task::STATUS_DONE;
            } else {
                $task->status = Task::STATUS_ACTIVE;
            }
        }
        $result = $task->save();
        return back()->with('status', 'Data successfully saved!');
    }
}
