<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view-project');
    }

    public function createProject(Request $request)
    {
        // dd($request->all());die(); // Untuk melihat semua parameter yang dilempar dari view
        $model = new Project;
        $model->project_name = $request->prjname;
        $model->description = $request->prjDescription;
        $model->start_datetime = $request->dateFrom;
        $model->finish_datetime = $request->dateTo;
        $model->pic = Auth::user()->id; // Mengambil ID user yang sedang login
        $model->message_board = "";
        $model->save();
        // dd($model->toArray());die();
        return redirect('list-project')->with('status', 'Data successfully created!');
    }

    public function listProject()
    {
        $datas = Project::all();
        
        return View('list-project', ['datas' => $datas]);
    }

    public function view()
    {
        return view('view-project');
    }

    public function message()
    {
        return view('message-board');
    }

    public function addTodoList()
    {
        return view('add-todo-list');
    }

    public function viewTodoList()
    {
        return view('view-todo-list');
    }
}
