<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\ProjectSprint;
use Illuminate\Support\Facades\Auth;
use View, Redirect;
use DB;

class SprintController extends BaseController
{
    public $pageId = 4;
    public function __construct()
    {
        parent::__construct();
        View::share('pageId', $this->pageId);
        
        $url = request()->url();
        $projectId = (substr($url, -1));
        $array = (explode('/', $url));
        view()->share('projectId', $array[4]);
    }

    public function viewSprint($projectId)
    {
        dd(auth()->user()->role);
        $project = Project::with('tasks')->find($projectId);
        // dd($project->tasks);
        foreach ($project->tasks as $task) {
        }
        if ($project) {
            // dd($project->sprints);
            return view('sprint.list-sprint', ['project' => $project]);
        }
    }

    public function createSprint($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $counter = ProjectSprint::where('project_id', $project->id)->count();
            $sprint = new ProjectSprint;
            $sprint->project_id = $project->id;
            $sprint->sprint = $counter + 1;
            $sprint->save();
            // return view('list-sprint', ['project' => $project]);
            return Redirect::route('sprint.list', ['project' => $project])->with('status', 'Sprint added!');
        }
    }

    public function delete($sprintId)
    {
        // return back()->with('status', 'Data successfully deleted!');
        DB::transaction(function () use ($sprintId) {
            $sprint = ProjectSprint::find($sprintId);
            // First, delete task with this current sprint, then delete this sprint.
            $deleteTask = Task::where('sprint_id', $sprint->id)->delete();
            // echo $deleteTask;
            if ($deleteTask) {
                $deleteSprint = $sprint->delete();
            }

            if ((!$deleteTask)) {
                throw new \Exception('Something went wrong!');
                // return back()->with('status', 'Something went wrong!');
            }
        });

        return back()->with('status', 'Sprint deleted!');
    }
}
