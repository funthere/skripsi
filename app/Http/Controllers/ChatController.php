<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\UserProject;
use Illuminate\Support\Facades\Auth;
use View, Redirect;
use App\Chat;

class ChatController extends BaseController
{
    public function chatting($id)
    {
        $project = Project::with('userProjects.user')->find($id);
        if ($project) {
            // return view('chat.chatting', ['project' => $project]);

            // print_r(auth()->user()->fullname);die();
            // return view('chat-club.public.index', ['project' => $project]);

            // $swID = rand(1, 87);
            // $swChar = json_decode(file_get_contents('https://swapi.co/api/people/'.$swID.'/'));
            $chats = Chat::with('user')->take(20)->get();
            $chatMessage = collect([]);
            foreach ($chats as $key => $chat) {
                $chat->sender = $chat->user->fullname;
                unset($chat->user);
                $who = auth()->user()->id == $chat->user_id ? "Me" : $chat->sender;
                $class = auth()->user()->id == $chat->user_id ? "mine" : "user";
                $chatMessage->push(["who" => $who, 'msg' => $chat->message, 'class' => $class]);

            }
            // dd($chatMessage->toJson());
            $chatMessage = $chatMessage->toJson();
            $userName = auth()->user()->fullname;

            $chatPort = \Request::input("p");
            $chatPort = $chatPort ?: 9090;
            return view('chat.chat', compact("chatPort", "userName", 'chatMessage'));
            // return view('chat.chat', ['project' => $project]);
        }
    }

    public function sendChat()
    {
        // dd(request()->all());
        $message = request('message');
        $projectId = request('project_id');
        if (!empty($message) && !empty($projectId)) {
            $chat = new Chat;
            $chat->project_id = $projectId;
            $chat->user_id = auth()->user()->id;
            $chat->message = $message;
            $saved = $chat->save();
            return (string)$saved;
        }
    }

    public function clearing()
    {
        View::share('hideMenu', true);
        return view('chat.clearing-chat');
    }
}
