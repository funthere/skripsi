<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use View, Redirect;
use Illuminate\Support\Facades\Hash;

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

    public function listUser()
    {
        $users = User::all();
        View::share('hideMenu', true);
        return view('user.list-user', compact('users'));
    }

    public function changePassword()
    {
        return view('auth.passwords.reset');
    }

    public function savePassword(Request $request)
    {
        // dd($request->all());
        $oldPassword = Hash::make(request('password'));

        $user = User::find(auth()->user()->id);
        if ($user) {
            $compare = Hash::check(request('password'), $user->password);
            if (!$compare) {
                return back()->with('error', 'Password does not match your current password');
            }
            if (request('new_password') != request('password_confirmation')) {
                return back()->with('error', 'New Password does not match with the confirmation password');
            }
            $user->password = bcrypt(request('new_password'));
            // dd($user);
            $result = $user->save();
            if ($result) {
                return back()->with('status', 'Your password successfully updated!');
            }
        }
    }
}
