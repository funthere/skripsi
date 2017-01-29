<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);
    }

    public function create()
    {
        View::share('hideMenu', true); // Fungsinya untuk menyembunyikan menu dari halaman yang akan dipanggil.
        View::share('hideHome', true);
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function createUser(Request $request)
    {
        // dd(request()->all());
        $result = User::create([
            'username' => request('username'),
            'fullname' => request('fullname'),
            'email' => request('email'),
            'password' => bcrypt('Standar123'),
        ]);
        if ($result) {
            return redirect('list-user')->with('status', 'User successfully created!');
        }
    }
}
