<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('project');
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
