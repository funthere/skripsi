<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use View, Redirect;

class UserController extends BaseController
{
    public $pageId = 2;
    public function __construct()
    {
        parent::__construct();
        View::share('pageId', $this->pageId);
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $users = User::search($term)->limit(5)->get();

        $formatted_users = [];

        foreach ($users as $user) {
            $formatted_users[] = ['id' => $user->id, 'text' => $user->fullname];
        }

        return \Response::json($formatted_users);
    }
}
