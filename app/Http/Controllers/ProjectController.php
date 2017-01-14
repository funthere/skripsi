<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use View, Redirect;

class ProjectController extends BaseController
{
    public $pageId = 1;
    public function __construct()
    {
        parent::__construct();
        View::share('pageId', $this->pageId);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        View::share('hideMenu', true); // Fungsinya untuk menyembunyikan menu dari halaman yang akan dipanggil.
        return view('view-project');
    }

    public function save(Request $request)
    {
        // dd($request->all());die(); // Untuk melihat semua parameter yang dilempar dari view
        if (!empty($request->id)) {
            $model = Project::find($request->id);
        } else {
            $model = new Project;
        }
        $model->project_name = $request->prjname;
        $model->description = $request->prjDescription;
        $model->start_datetime = $request->dateFrom;
        $model->finish_datetime = $request->dateTo;
        $model->pic = Auth::user()->id; // Mengambil ID user yang sedang login
        $model->message_board = "";
        $model->save();
        // dd($model->toArray());die();
        return redirect('list-project')->with('status', 'Data successfully saved!');
    }

    public function listProject()
    {
        View::share('hideMenu', true);
        $datas = Project::with('user')->get();
        
        return View('list-project', ['datas' => $datas]);
    }

    public function view($id)
    {
        $project = Project::find($id);
        if ($project) {
            return view('view-project', ['project' => $project]);
        }
    }

    public function viewTeam()
    {
        return view('view-project-team');
    }

    public function message($id)
    {
        $project = Project::find($id);
        if ($project) {
            return view('message-board')->with(['project' => $project]);
        }
    }

    public function messageSave($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->message_board = request('prjDescription');
            $project->save();
        }
        return Redirect::route('message-board.create', ['id' => $project->id])->with(['project' => $project]);
    }

    public function viewMessage()
    {
        return view('view-message-board');
    }

    public function addTodoList()
    {
        return view('add-todo-list');
    }
    public function viewTodoList()
    {
        return view('view-todo-list');
    }

    public function upload()
    {
        return view('upload');
    }

    public function download()
    {
        return view('download');
    }

    public function chatting()
    {
        return view('chatting');
    }

    public function clearing()
    {
        View::share('hideMenu', true);
        return view('clearing-chat');
    }
}
