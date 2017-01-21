<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\UserProject;
use Illuminate\Support\Facades\Auth;
use View, Redirect;
use Response;

class ChatController extends BaseController
{
 	public function chatting($id)
    {
    	$project = Project::with('userProjects.user')->find($id);
        if ($project) {
        return view('chat.chatting', ['project' => $project]);
        }
    }

    public function clearing()
    {
        View::share('hideMenu', true);
        return view('chat.clearing-chat');
    }
}