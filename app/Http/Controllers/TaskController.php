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
        // dd(count($array));
        if (count($array) > 5) {
            view()->share('projectId', $array[4]);
        }
    }

    public function viewTask($projectId, $sprintId)
    {
        $datas = Task::where(['project_id' => $projectId, 'sprint_id' => $sprintId])->get();
        $sprint = ProjectSprint::find($sprintId);
        $datas = $datas->groupBy('sprint_id');
        // dd($datas);
        if (auth()->user()->role == "member") {
            $project = Project::with('sprints.tasks')->find($projectId);
            return view('task.list-task', ['datas' => $datas, 'projectId' => $projectId, 'sprint' => $sprint, 'project' => $project]);
        }
        return view('task.list-task', ['datas' => $datas, 'projectId' => $projectId, 'sprint' => $sprint]);
    }

    public function viewTaskMember($projectId)
    {
        $datas = Task::where(['project_id' => $projectId])->get();
        $datas = $datas->groupBy('sprint_id');
        // dd($datas);
        if (auth()->user()->role == "member") {
            $project = Project::with('sprints.tasks')->find($projectId);
            return view('task.list-task', ['datas' => $datas, 'projectId' => $projectId, 'project' => $project]);
        }
        return view('task.list-task', ['datas' => $datas, 'projectId' => $projectId]);
    }

    public function addTask($projectId, $sprintId)
    {
        $project = Project::with('userProjects', 'sprints')->find($projectId);
        $sprint = ProjectSprint::find($sprintId);
        if (!$project) {
            // not found
        } else {
            $task = new Task;
            return view('task.add-todo-list', ['project' => $project, 'task' => $task, 'sprint' => $sprint]);
        }
    }

    public function saveTask($projectId, $sprintId)
    {
        $project = Project::find($projectId);
        $taskId = request()->get('taskId');
        // Validate
        // dd(request('deadline') < date('Y-m-d'));
        if (request('deadline') < date('Y-m-d')) {
        	return back()->with('error', "Deadline must be greater than yesterday");
        }

        if (!empty($taskId)) {
            $task = Task::find($taskId);
        } else {
            $task = new Task;
        }
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

    public function delete($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->delete();
        }
        return back()->with('status', 'Data successfully deleted!');
    }

    public function editTask($taskId)
    {
        $task = Task::find($taskId);
        // dd($task);
        if ($task) {
            $project = Project::find($task->project_id);
            $sprint = ProjectSprint::find($task->sprint_id);
            return view('task.add-todo-list', ['project' => $project, 'task' => $task, 'sprint' => $sprint]);
        }
    }

    public function memberTaskAjax()
    {
        $sprintId = request()->get('sprint_id');
        $tasks = Task::where('sprint_id', $sprintId)->where('assigned_to', auth()->user()->id)->get();
        // return $tasks;
        $jsonSource = [];
        foreach ($tasks as $task) {
            $jsonSource['data'][] = [
                $task->id,
                $task->activity,
                $task->description,
                $task->assignedTo && $task->assignedTo->fullname ? $task->assignedTo->fullname : '',
                $task->deadline_datetime,
                $task->status
            ];
        }
        $view = View::make('task.member-task', ['tasks' => $tasks]);
        $contents = (string)$view;
        // or
        // $contents = $view->render();
        // return
        return response()->json($contents);
    }

    public function changeStatusAjax()
    {
        $taskId = request()->get('task_id');
        $task = Task::find($taskId);
        if ($task) {
            if ($task->status == Task::STATUS_ACTIVE) {
                $task->status = Task::STATUS_DONE;
            } else {
                $task->status = Task::STATUS_ACTIVE;
            }
        }
        $result = $task->save();
        return response()->json($result);
    }
}
