<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use View, Redirect;
use App\Chat;

class ChatController extends BaseController
{ 
    public function viewChat($id)
    {
        View::share('menuActive', 6);
        $project = Project::with('userProjects.user')->find($id);
        if ($project) {
            // return view('chat.chatting', ['project' => $project]);

            $chats = Chat::with('user')->where('project_id', $id)->take(20)->get();
            $chatMessage = collect([]);
            foreach ($chats as $key => $chat) {
                $chat->sender = $chat->user->fullname;
                unset($chat->user);
                $who = auth()->user()->id == $chat->user_id ? "Me" : $chat->sender;
                $class = auth()->user()->id == $chat->user_id ? "mine" : "user";
                $time = $chat->created_at;
                $chatMessage->push(["who" => "(" . $time . ") " . $who, 'msg' => $chat->message, 'class' => $class, 'channel' => $chat->project_id]);

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
        if (auth()->user()->role != "administrator") {
            //kick
            // return view('errors.403')->with('error', "You are not authorized to visit this pages.");
        }
        $projects = Project::all();
        View::share('hideMenu', true);
        return view('chat.clearing-chat', compact('projects'));
    }

    public function clearingSave()
    {
        $all = request()->all();
        $projectId = request('project_id');
        $dateFrom = request('dateFrom');
        $dateTo = request('dateTo');
        $dateTo = new \DateTime($dateTo);
        $dateTo = $dateTo->modify('+1 day')->format('Y-m-d H:i:s');
        // print_r($dateTo);
        if ($dateFrom && $dateTo) {
            $countData = Chat::where(['project_id' => $projectId])->where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->count();
            $delete = Chat::where(['project_id' => $projectId])->where('created_at', '>=', $dateFrom)->where('created_at', '<=', $dateTo)->delete();
            // dd($data);
            // foreach ($data as $chat) {
            //     echo $chat->message."<br>";
            // }
            // dd($delete);
            if ($delete || $countData == 0) {
                return back()->with('status', "All chat on selected range date have been cleared successfully!");
            }

        }
    }
}
